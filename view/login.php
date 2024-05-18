<?php
    session_start();
    ob_start();

    include "../connect.php";
    include "../user.php";
    if((isset($_POST['login'])) && ($_POST['login'])){
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $result = checkUser($name, $pass);
        if ($result==TRUE) {
            header('Location: ..\index.php');
        }else {
            $txt_error = "Incorrect username or password.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="..\css\login.css">
    <style>

    </style>
</head>

<body>
    <div class="login-form">
        <h1>Login</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Log In</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <input id="one" type="text" name="name" placeholder="User Name" required autofocus="">
                        <input id="one" type="password" name="pass" placeholder="User Password" required autofocus="">
                        <?php
                            if(isset($txt_error) && $txt_error!=""){
                                echo "<p style='color: red; padding-bottom: 10px;'>".$txt_error."</p>";
                            }
                        ?>
                        <input id="Two" class="btn" type="submit" name="login"></input>
                        <p class="forgot"> <a href="\view/forgotten-pass.php">Forgotten password?</a></p>
                    </form>
                    <p  class="account">Don't Have An Account? <a href="\view/registration.php">Register</a></p>

                </div>
                <div class="form-img">
                    <img src="..\images\bg.png" alt="">
                </div>
            </div>
        </div>
    </div>
</body>

</html>