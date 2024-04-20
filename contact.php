<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Check if name or email is empty
    // if (empty($name) || empty($email) || empty($_POST["message"]) || empty($_POST["subject"])) {
    //     echo 'Please fill in all required fields.';
    //     return;
    // }

    // Prepare the email
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                               
        $mail->Username = '52200155@student.tdtu.edu.vn';                 
        $mail->Password = 'hddf eihi qtlh qwga';                           
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
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>