<?php
session_start();


if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    
}


$username = htmlspecialchars($_SESSION['username']);
$user_id = htmlspecialchars($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Payment Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
        }
        .dashboard-container {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .card {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container dashboard-container">
    <div class="row mb-4 align-items-center">
        <div class="col-md-9 col-sm-8 text-center text-md-start">
            <h1 class="text-primary">Payment Portal Dashboard</h1>
            <p class="lead mb-0">Welcome back, <strong><?php echo $username; ?></strong>. Manage your payments below.</p>
        </div>
        <div class="col-md-3 col-sm-4 text-center text-md-end mt-3 mt-md-0">
            <button id="logoutBtn" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                Logout
            </button>
        </div>
    </div>
    <hr>
    
    <div class="row">
        
        <div class="col-lg-5">
            <div class="card shadow-sm text-center">
                <div class="card-body py-5">
                    <h5 class="card-title mb-4">Ready to Make a Payment?</h5>
                    <p class="card-text text-muted">Click the button below to securely enter your transaction details.</p>
                    
                    <button type="button" class="btn btn-success btn-lg mt-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#paymentModal">
                        💵 Start New Payment
                    </button>
                    
                    <hr class="my-4">
                    <p class="mb-0 small">Logged in as: <strong><?php echo $username; ?></strong> (ID: <?php echo $user_id; ?>)</p>
                </div>
            </div>
        </div>



<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="paymentModalLabel">Secure Transaction Form</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form id="modalPaymentForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Paying As (User ID: <?php echo $user_id; ?>)</label>
                        <input type="text" class="form-control" value="<?php echo $username; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name for Transaction" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Billing Address" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" placeholder="Contact (e.g., Email/Phone)" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" placeholder="0.00" min="0.01" step="0.01" required>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                
                <button type="button" class="btn btn-success btn-pay"
                    data-id="<?php echo $user_id; ?>"
                    data-t_id="">
                    Process Payment
                </button>
            </div>
            
        </div>
    </div>
</div>

<script src="../../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    
   
    function loadPaymentHistory() {
        console.log("Loading payment history for user ID: <?php echo $user_id; ?>");
        
    }
    loadPaymentHistory(); 

    
    $('#logoutBtn').on('click', function() {
    window.location.href = '../../pages/logout.php';
});


    
    $('.btn-pay').on('click', function() {
        
        
        const name = $('#name').val();
        const add = $('#address').val();
        const contact = $('#contact').val();
        const amount = Number($('#amount').val());
        const id = $(this).data('id');
        const t_id = $(this).data('t_id');
        
        
        if (!name || !add || !contact || amount <= 0) {
            alert('Please fill in all details and ensure the amount is greater than zero.');
            return;
        }

        console.log(`Processing payment for ${name}, Amount: ${amount}`);

       
        $.ajax({
            url: '../../handlers/pay.php',
            method: "post",
            data: {
                'pay_now': true,
                'name': name,
                'add': add,
                'contact': contact,
                'amount': amount,
                'id': id,
                't_id': t_id
            },
            dataType: 'json',
            success: function(response) {
                
                $('#paymentModal').modal('hide'); 
                
                if (response.success) {
                    alert(response.success);
                   
                    loadPaymentHistory();
                   
                    $('#modalPaymentForm')[0].reset(); 
                } else {
                    alert("Payment failed: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                $('#paymentModal').modal('hide'); 
                console.error("AJAX Error:", status, error);
                alert("An unexpected error occurred. Please try again.");
            }
        });
    });
    
   
    $('#load-history').on('click', function() {
        loadPaymentHistory();
    });
});
</script>

</body>
</html>