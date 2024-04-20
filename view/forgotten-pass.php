<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php'; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        include "..\model\connect.php";
        include "..\model\user.php";
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
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forgot</title>
    <link rel="stylesheet" href="\WEBGK\css\registration.css">
</head>

<body>
    <div class="wrapper">
        <h2>Forgot</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="input-box">
                <input type="email" placeholder="Enter your Email" required name="email">
            </div>
            <div class="input-box button">
                <input type="submit" value="Continue" name="check">
            </div>
        </form>
    </div>

</body>

</html>