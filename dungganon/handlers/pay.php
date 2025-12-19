<?php
header('Content-Type: application/json');
include('../Classes/Connection.php');
$conn = (new Dbh())->connect();

if (isset($_POST['pay_now'])) {

    $id      = $_POST['id'] ?? null;
    $name    = $_POST['name'] ?? '';
    $add     = $_POST['add'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $amount  = $_POST['amount'] ?? 0;

    // Validation
    if (!$id || !$name || !$add || !$contact || $amount <= 0) {
        echo json_encode(['error' => 'Please fill in all fields correctly']);
        exit();
    }

    // Prepare insert query with date and backticks
    $stmt = $conn->prepare("
        INSERT INTO `transaction` (id, name, address, contact, amount, status, date)
        VALUES (?, ?, ?, ?, ?, 'pending', NOW())
    ");
    if (!$stmt) {
        echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
        exit();
    }

    $stmt->bind_param("isssd", $id, $name, $add, $contact, $amount);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Payment submitted. Waiting for approval']);
    } else {
        echo json_encode(['error' => 'Payment failed: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
