<?php
include('../Classes/Connection.php'); 
include('../Classes/Client.php');    

$conn = (new Dbh())->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    
    if ($action === 'delete') {
        $stmt = $conn->prepare("DELETE FROM transaction WHERE t_id=?");
        $stmt->bind_param("i", $_POST['t_id']);
        $stmt->execute();
        echo json_encode(['message' => 'Payment deleted successfully']);
        exit();
    }

    
    if ($action === 'update_status') {
        $stmt = $conn->prepare("UPDATE transaction SET status=? WHERE t_id=?");
        $stmt->bind_param("si", $_POST['status'], $_POST['t_id']);
        $stmt->execute();
        echo json_encode(['message' => 'Status updated successfully']);
        exit();
    }

   
    if ($action === 'edit') {
        $stmt = $conn->prepare("UPDATE transaction SET name=?, address=?, contact=?, amount=? WHERE t_id=?");
        $stmt->bind_param("sssdi", $_POST['name'], $_POST['address'], $_POST['contact'], $_POST['amount'], $_POST['t_id']);
        $stmt->execute();
        echo json_encode(['message' => 'Payment updated successfully']);
        exit();
    }
}


$result = $conn->query("SELECT * FROM transaction ORDER BY date DESC");

if ($result->num_rows > 0) {
    echo '<table class="table table-hover text-white">
            <thead>
                <tr>
                    <th>T_ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>'.$row['t_id'].'</td>
                <td>'.htmlspecialchars($row['name']).'</td>
                <td>'.htmlspecialchars($row['address']).'</td>
                <td>'.htmlspecialchars($row['contact']).'</td>
                <td>'.number_format($row['amount'], 2).'</td>
                <td>
                    <select id="status_'.$row['t_id'].'" class="form-select form-select-sm" onchange="updateStatus('.$row['t_id'].')">
                        <option value="pending" '.($row['status']=='pending'?'selected':'').'>Pending</option>
                        <option value="approved" '.($row['status']=='approved'?'selected':'').'>Approved</option>
                        <option value="declined" '.($row['status']=='declined'?'selected':'').'>Declined</option>
                    </select>
                </td>
                <td>'.$row['date'].'</td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="editPayment('.$row['t_id'].')">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deletePayment('.$row['t_id'].')">Delete</button>
                </td>
            </tr>';
    }
    echo '</tbody></table>';
} else {
    echo '<p class="text-center">No payments found.</p>';
}
