<?php
// Correct includes
include('../Classes/Connection.php');
include('../Classes/Client.php');
$conn = (new Dbh())->connect();

// Handle POST requests (delete, update status, edit amount)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // Delete payment
    if ($action === 'delete') {
        $t_id = $_POST['t_id'];
        $stmt = $conn->prepare("DELETE FROM `transaction` WHERE t_id = ?");
        $stmt->bind_param("i", $t_id);
        $stmt->execute();
        echo json_encode(['message' => 'Payment deleted successfully']);
        exit();
    }

    // Update status
    if ($action === 'update_status') {
        $t_id = $_POST['t_id'];
        $status = $_POST['status'];
        $stmt = $conn->prepare("UPDATE `transaction` SET status = ? WHERE t_id = ?");
        $stmt->bind_param("si", $status, $t_id);
        $stmt->execute();
        echo json_encode(['message' => 'Status updated successfully']);
        exit();
    }

    // Edit amount only
    if ($action === 'edit') {
        $t_id = $_POST['t_id'];
        $amount = $_POST['amount'];
        $stmt = $conn->prepare("UPDATE `transaction` SET amount = ? WHERE t_id = ?");
        $stmt->bind_param("di", $amount, $t_id);
        if ($stmt->execute()) {
            echo json_encode(['message' => 'Amount updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update amount']);
        }
        exit();
    }
}

// Handle GET request: return payments table
$stmt = $conn->prepare("SELECT t_id, name, address, contact, amount, status, date FROM `transaction` ORDER BY date DESC");
$stmt->execute();
$res = $stmt->get_result();

echo '<table class="table table-bordered text-white">';
echo '<thead><tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
      </tr></thead><tbody>';

while ($row = $res->fetch_assoc()) {
    echo '<tr>';
    echo '<td>'.$row['t_id'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['address'].'</td>';
    echo '<td>'.$row['contact'].'</td>';
    echo '<td>'.number_format($row['amount'],2).'</td>';
    echo '<td>
            <select id="status_'.$row['t_id'].'" onchange="updateStatus('.$row['t_id'].')">
                <option value="pending" '.($row['status']=='pending'?'selected':'').'>Pending</option>
                <option value="approved" '.($row['status']=='approved'?'selected':'').'>Approved</option>
                <option value="declined" '.($row['status']=='declined'?'selected':'').'>Declined</option>
            </select>
          </td>';
    echo '<td>'.$row['date'].'</td>';
    echo '<td>
            <button class="btn btn-sm btn-primary" onclick="editPayment('.$row['t_id'].')">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="deletePayment('.$row['t_id'].')">Delete</button>
          </td>';
    echo '</tr>';
}

echo '</tbody></table>';
