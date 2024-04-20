<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $mail = new PHPMailer();
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                               
        $mail->Username = '52200155@student.tdtu.edu.vn';                 
        $mail->Password = 'eags pwty jjij hsuq';                           
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    

        //Recipients
        $mail->setFrom('52200155@student.tdtu.edu.vn', 'WEBGK-N11');
        $mail->addAddress($email, $name);     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Confirmation of Contact Form Submission';
        $mail->Body    = "Dear $name,<br><br>Thank you for your submission.<br><br>Best regards,<br>Group 11";
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>