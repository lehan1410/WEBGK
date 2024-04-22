<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        include "..\model\connect.php";
        include "..\model\user.php";
        $code = file_get_contents("temp.txt");
        $a = checkUser4($pass1, $code);
        if ($pass1 == $pass2){
            if ($a == TRUE){
                header('Location: \WEBGK\view\login.php');
            }
        else {
            $txt_error = "Incorrect password.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="\WEBGK\css\registration.css">
</head>

<body>
    <div class="wrapper">
        <h2>Change password</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="input-box">
                <input type="text" placeholder="Create Password" required name="pass1">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Confirm Password" required name="pass2">
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