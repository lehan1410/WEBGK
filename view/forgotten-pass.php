<?php
    session_start();
    ob_start();

    include "..\model\connect.php";
    include "..\model\user.php";
    if((isset($_POST['check'])) && ($_POST['check'])){
        $email = $_POST['email'];   
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $txt_error = "Invalid email format";
        }else {
            checkUser2($email);
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