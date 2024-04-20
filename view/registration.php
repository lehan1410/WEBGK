<?php
    session_start();
    ob_start();

    include "..\model\connect.php";
    include "..\model\user.php";
    if((isset($_POST['sign'])) && ($_POST['sign'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];      
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $txt_error = "Invalid email format";
        }else {
            $result = checkUser1($name, $email);
            if ($result==FALSE and $pass1 == $pass2) {
                $conn = get_connection();
                $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $pass1);
                $stmt->execute();
                header('Location: \WEBGK\view\login.php');
            }else {
                $txt_error = "Incorrect username or password.";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration form in HTML CSS </title>
    <link rel="stylesheet" href="\WEBGK\css\registration.css">
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="input-box">
                <input type="text" placeholder="Enter your Name" required name="name">
            </div>
            <div class="input-box">
                <input type="email" placeholder="Enter your Email" required name="email">
            </div>
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
            <div class="policy">
                <input type="checkbox">
                <h3>I accept terms & conditions</h3>

            </div>
            <div class="input-box button">
                <input type="submit" value="Register Now" name="sign">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="\WEBGK\view/login.php">Login Now</a></h3>
            </div>
        </form>
    </div>

</body>

</html>