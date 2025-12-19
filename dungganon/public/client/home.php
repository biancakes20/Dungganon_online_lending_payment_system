<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include('../../Classes/Connection.php');
$conn = (new Dbh())->connect();

$user_id  = $_SESSION['id'];
$username = $_SESSION['username'];

/* FIXED LOAN */
$loan_amount = 5000;

/* TOTAL APPROVED PAYMENTS */
$stmt = $conn->prepare("
    SELECT SUM(amount) AS total_paid 
    FROM `transaction` 
    WHERE id = ? AND status = 'approved'
");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

$total_paid = $row['total_paid'] ?? 0;
$balance = $loan_amount - $total_paid;
$balance = max($balance, 0); // Ensure no negative balance
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Client Payment Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4>Payment Dashboard</h4>
            <p>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong></p>
        </div>
        <a href="../../pages/logout.php" class="btn btn-danger">Logout</a>
    </div>

    <!-- LOAN SUMMARY -->
    <div class="card mb-4 text-center">
        <div class="card-body">
            <h5>Loan Summary</h5>
            <p><strong>Loan Amount:</strong> ₱<?php echo number_format($loan_amount,2); ?></p>
            <p><strong>Total Paid:</strong> ₱<?php echo number_format($total_paid,2); ?></p>
            <p>
                <strong>Remaining Balance:</strong>
                <span class="<?php echo $balance == 0 ? 'text-success' : 'text-danger'; ?>">
                    ₱<?php echo number_format($balance,2); ?>
                </span>
            </p>
        </div>
    </div>

    <!-- PAY BUTTON -->
    <div class="card mb-4 text-center">
        <div class="card-body">
            <button class="btn btn-success btn-lg"
                data-bs-toggle="modal"
                data-bs-target="#paymentModal"
                <?php echo $balance == 0 ? 'disabled' : ''; ?>>
                💵 Make Payment
            </button>
        </div>
    </div>

    <!-- PAYMENT HISTORY -->
    <div class="card">
        <div class="card-body">
            <h5>Payment History</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $stmt = $conn->prepare("
                    SELECT amount, status, date 
                    FROM `transaction` 
                    WHERE id = ? 
                    ORDER BY date DESC
                ");
                if (!$stmt) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>₱".number_format($row['amount'],2)."</td>
                                <td>".htmlspecialchars($row['status'])."</td>
                                <td>".htmlspecialchars($row['date'])."</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No payments yet</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- PAYMENT MODAL -->
<div class="modal fade" id="paymentModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Make Payment</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="mb-2">
            <label>Full Name</label>
            <input type="text" id="name" class="form-control">
        </div>
        <div class="mb-2">
            <label>Address</label>
            <input type="text" id="address"  class="form-control">
        </div>
        <div class="mb-2">
            <label>Contact</label>
            <input type="text" id="contact"  class="form-control">
        </div>
        <div class="mb-2">
            <label>Amount</label>
            <input type="number" id="amount" class="form-control" min="1" max="<?php echo $balance; ?>">
            <small>Remaining: ₱<?php echo number_format($balance,2); ?></small>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-success btn-pay" data-id="<?php echo $user_id; ?>">
            Pay Now
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$('.btn-pay').click(function () {

    const name = $('#name').val();
    const add = $('#address').val();
    const contact = $('#contact').val();
    const amount = parseFloat($('#amount').val());
    const balance = <?php echo $balance; ?>;
    const id = $(this).data('id');

    if (!name || !add || !contact || isNaN(amount) || amount <= 0) {
        alert('Please fill in all fields correctly');
        return;
    }

    if (amount > balance) {
        alert('Payment exceeds remaining balance');
        return;
    }

    $.ajax({
        url: '../../handlers/pay.php',
        method: 'POST',
        data: {
            pay_now: true,
            name: name,
            add: add,
            contact: contact,
            amount: amount,
            id: id,
        },
        dataType: 'json',
        success: function(res) {
            if (res.success) {
                alert(res.success);
                location.reload();
            } else {
                alert(res.error || 'Payment failed');
            }
        },
        error: function() {
            alert('Server error. Please try again.');
        }
    });
});
</script>

</body>
</html>
