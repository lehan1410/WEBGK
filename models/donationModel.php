<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/autoload.php'; 


function checkUser($email) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function donate($first_name, $last_name, $email, $donation_amount, $payment_method) {
    $conn = get_connection();
    $stmt = $conn->prepare("INSERT INTO donation (first_name, last_name, email, donation_total, payment_method) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("sssss",$first_name, $last_name, $email, $donation_amount, $payment_method);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

?>