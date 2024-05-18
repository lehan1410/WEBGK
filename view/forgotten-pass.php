<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        include "../connect.php";
        include "../user.php";
        $a = checkUser2($email);
        if ($a == TRUE){
            header('Location: ..\view\reset-code.php');
        }else {
            $txt_error = "Incorrect email.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forgot</title>
    <link rel="stylesheet" href="..\css\registration.css">
</head>

<body>
    <div class="wrapper">
        <h2>Forgot</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="input-box">
                <input type="email" placeholder="Enter your Email" required name="email">
            </div>
            <?php
                if(isset($txt_error) && $txt_error!=""){
                    echo "<p style='color: red; padding-bottom: 10px;'>".$txt_error."</p>";
                }
            ?>
            <div class="input-box button">
                <input type="submit" value="Continue" name="check">
            </div>
        </form>
    </div>

</body>

</html>