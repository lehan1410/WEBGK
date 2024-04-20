<?php


function checkUser($name, $pass) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE name = ? AND password = ?");
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
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
    $mail = new PHPMailer(TRUE); 
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
    }else{
        $errors['email'] = "This email address does not exist!";
    }
}   
?>