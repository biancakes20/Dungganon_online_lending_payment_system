<?php
include('../Classes/Client.php');
$clients = new Users();

if (isset($_POST['pay_now'])) {

    $name    = $_POST['name'];
    $add     = $_POST['add'];
    $contact = $_POST['contact'];
    $id      = $_POST['id'];
    $t_id    = $_POST['t_id'];
    $amount  = $_POST['amount'];
    

 
    if (empty($name) || empty($add) || empty($contact)) {
        $response = array(
            'error' => "Please fill out all fields."
        );
        echo json_encode($response);
        exit;
    }

    
    $pay = $clients->payNow($t_id, $id, $name, $add, $contact, $amount);

    if ($pay == 1) {
        $response = array(
            'success' => "Paid Successfully!"
        );
    } else if ($pay == 2) {
        $response = array(
            'error' => "Please try again"
        );
    } else {
        $response = array(
            'error' => "Database error"
        );
    }

    echo json_encode($response);
    exit;
}
