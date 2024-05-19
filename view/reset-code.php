<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $code = $_POST['code'];
        include "../models/connect.php";
        include "../models/user.php";
        $a = checkUser3($code);
        if ($a == TRUE){
            file_put_contents("temp.txt", $code);
            header('Location: ..\view\change-pass.php');
        }else {
            $txt_error = "Incorrect code.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="..\css\registration.css">
</head>

<body>
    <div class="wrapper">
        <h2>Code Verification</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="input-box">
                <input type="text" placeholder="Enter your Code" required name="code">
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