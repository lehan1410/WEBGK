<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/autoload.php'; 
function checkUser($email, $pass) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}
function getName($email) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT name FROM user WHERE email = ?");
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false; 
    }
    $stmt->bind_param("s", $email); 
    if (!$stmt->execute()) {
        echo "Error executing statement: " . $stmt->error;
        return false; 
    }
    $result = $stmt->get_result(); 
    $data = $result->fetch_assoc(); 
    $stmt->close(); 
    $conn->close(); 
    return $data['name'];
}
function checkUser1($name, $email) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE name = ?  AND email = ?");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function checkUser2($email) {        
    $mail = new PHPMailer(); 
    $conn = get_connection();
    $email = mysqli_real_escape_string($conn, $email);
    $check_email = "SELECT * FROM user WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE user SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($conn, $insert_code);
        if($run_query){
            $mail->SMTPDebug = 0;  
            $mail->Mailer = "smtp"; 
            $mail->isSMTP();                          
            $mail->Host = 'smtp.gmail.com';            
            $mail->SMTPAuth = true;                     
            $mail->Username = '52200155@student.tdtu.edu.vn';                 
            $mail->Password = 'eags pwty jjij hsuq';       
            $mail->SMTPSecure = 'tls';                  
            $mail->Port = 587;
            $mail->setFrom('52200155@student.tdtu.edu.vn', 'WEBGK-N11');
            $mail->addAddress($email);    
            $mail->isHTML(true);                                  
            $mail->Subject = 'Password Reset Code';
            $mail->Body    = "Your password reset code is $code";
            $mail->send(); 
            return TRUE;
        }
    }
    return FALSE;
}
function checkUser3($code) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function checkUser4($pass1, $code) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    
    if ($rowCount > 0) {
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE code = ?");
        $stmt->bind_param("ss", $pass1, $code);
        $stmt->execute();
        $stmt->close();
        return TRUE;
    }
    return FALSE;
}
function donate($first_name, $last_name, $email, $donation_amount) {
    $conn = get_connection();
    $stmt = $conn->prepare("INSERT INTO donation (first_name, last_name, email, donation_total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd",$first_name, $last_name, $email, $donation_amount);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>