<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
function checkForm($name, $email, $number, $subject, $message ){
    if(empty($name) || empty($email) || empty($number) || empty($subject) || empty($message)){
        echo '<script>alert("Please enter complete information.")</script>';
        return false;
    }
    return true; 
}
function checkForm1($first_name, $last_name, $email, $donation_amount, $payment_method){
    if(empty($first_name) || empty($last_name) || empty($email) || empty($donation_amount) || empty($payment_method)){
        echo '<script>alert("Please enter complete information.")</script>';
        return false;
    }
    return true; 
}
session_start();
ob_start();

$user_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
print_r($_SESSION['name']);
$logged_in = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;

include "./models/connect.php";
include "./models/donationModel.php";

if((isset($_POST['send'])) && ($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];   
    $result = checkForm($name, $email, $number, $subject, $message);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $txt_error = "Invalid email format";
    }else {
        if ($result=='TRUE') {
            header('Location: \WEBGK\view\donation.php');
        }else {
            $txt_error = "Please enter complete information.";
        }
    }
    
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['donate'])) {
    if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['donation_amount']) || empty($_POST['payment_method'])) {
        echo '<script>alert("Please enter complete information.")</script>';
    } else {
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $donation_amount = $_POST['donation_amount'];
        $payment_method = $_POST['payment_method'];
        $result = checkUser($email);
        if ($result==TRUE) {
            $result1 = donate($first_name, $last_name, $email, $donation_amount, $payment_method);
            if ($result1==TRUE) {
                header('Location: /donation-success.php');
            }
            else {
                echo '<script>alert("Donation failed.")</script>';
            }
        }
        else {
            echo '<script>alert("User not found.")</script>';
        }
    }
}

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['donate'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname . ' ' . $lname;
    $email = $_POST['email'];
    $mail = new PHPMailer();
    try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '52200155@student.tdtu.edu.vn';
    $mail->Password = 'eags pwty jjij hsuq';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('52200155@student.tdtu.edu.vn', 'WEBGK-N11');
    $mail->addAddress($email, $name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation of Donation Form Submission';

    $mail->Body = "
    <html>

    <head>
        <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fafafa;
        }

        .header {
            background-color: #769593;
            /* Change to a fresh green color */
            color: white;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .content {
            padding: 30px;
            color: #333;
        }

        .footer {
            background-color: #769593;
            /* Change to a fresh green color */
            color: white;
            padding: 30px;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #ddd;
        }
        </style>
    </head>

    <body>
        <div class='container'>
            <div class='header'>
                <h2>Thank You for Your Donation</h2>
            </div>
            <div class='content'>
                <p>Dear <strong>$name</strong>,</p>
                <p>Thank you for your generous donation to the <strong style='color: red;'>Dona11 Organization</strong>.<br>
                    Your support helps us continue our mission and reach our goals. We greatly appreciate your contribution
                    and look forward to your continued support in the future.</p>
            </div>
            <div class='footer'>
                <strong>Best regards,<br>Group 11</strong>
            </div>
        </div>
    </body>

    </html>";
    $mail->send();
    } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mail = new PHPMailer();
    try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '52200155@student.tdtu.edu.vn';
    $mail->Password = 'eags pwty jjij hsuq';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('52200155@student.tdtu.edu.vn', 'WEBGK-N11');
    $mail->addAddress($email, $name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation of Contact Form Submission';
    $mail->Body = "
    <html>

    <head>
        <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fafafa;
        }

        .header {
            background-color: #769593;
            /* Change to a fresh green color */
            color: white;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .content {
            padding: 30px;
            color: #333;
        }

        .footer {
            background-color: #769593;
            /* Change to a fresh green color */
            color: white;
            padding: 30px;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #ddd;
        }
        </style>
    </head>

    <body>
        <div class='container'>
            <div class='header'>
                <h2>Thank You for Your Contact</h2>
            </div>
            <div class='content'>
                <p>Dear $name,</p>
                <p>Thank you for your recent submission to our organization. We appreciate the time and effort you have put
                    into this. Our team will review your submission and get back to you as soon as possible.</p>
                <p>In the meantime, if you have any questions or need further assistance, please do not hesitate to contact
                    us.</p>
            </div>
            <div class='footer'>
                Best regards,<br>Group 11
            </div>
        </div>
    </body>

    </html>";
    $mail->send();
    } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- siteicons -->

    <link rel="icon" href="images/Sitelogo.png">
    <link href="css/donation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>

<body>
    <!-- start-header -->
    <header id="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/black-logo.png" alt="../"></a>
                </div>
                <ul>
                    <li><a class="one" href="help-me.php">Help me </a></li>
                    <li><a class="one" href="about-us.php">About us</a></li>
                    <li><a class="one" href="donation.php" style="font-weight: 600;">Donation</a>
                    </li>
                    <li><a class="one" href="news.php">News</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Pages</span>
                            <i class="fa fa-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="donation-form.php">Donation Form</a></li>
                            <li><a href="donation-success.php">Donation Success</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="wc-btn">
                    <?php if ($logged_in) : ?>
                    <div class="logged-in-user" style="display:flex">
                        <a style="margin-left:30px" href="/view/logout.php" class="btn btn-primary">Logout</a>
                        <p style="margin-right:30px;"><strong> Welcome, <?php echo $user_name; ?>!</p>
                    </div>
                    <?php else : ?>
                    <div class="wc-btn">
                        <a href="/view/login.php" class="btn btn-primary">Login</a>
                    </div>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <div class="main">
        <div class="page">
            <!-- <===== Start-Donation-section =====> -->
            <div class="container">
                <form method="POST" action=" <?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="donation-box">
                        <h2>Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco </h2>
                        <div class="donation">
                            <img src="images/donation-2.png" alt="../">
                            <div class="donation1">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit
                                </p>
                                <h3>Donation an any amount</h3>
                                <div class="button">
                                    <span>$</span>
                                    <input type="text" class="form-control" name="donation_amount" id="donation_amount"
                                        placeholder="25">
                                </div>
                                <h4>Select Payment Method</h4>
                                <label class="Radio">
                                    <input type="radio" name="payment_method" value="Online banking">
                                    <span class="list-item-label">Online banking</span>
                                </label>
                                <label class="Radio">
                                    <input type="radio" name="payment_method" value="Offline donation">
                                    <span class="list-item-label">Offline donation</span>
                                </label>
                                <label class="Radio">
                                    <input type="radio" name="payment_method" value="Credit Card">
                                    <span class="list-item-label">Credit Card</span>
                                </label>
                            </div>
                        </div>
                        <div class="personal-info" id="c">
                            <h4>Personal info</h4>
                            <div class="info">
                                <input type="text" class="form-control" name="fname" placeholder="First name">
                                <input type="text" class="form-control" name="lname" placeholder="Last name">
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                            <div class="btn-text" id="donation_total" name="donation_total">Donation Total: </div>
                            <button class="donate_button" type="submit" id="donate-button" name="donate">Donate</button>
                        </div>
                    </div>
                </form>
                <div class=" donation-wrapper">
                    <div class="donation-content">
                        <div class="donation-content-p">
                            <p>If you are going to use a passage
                                of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden
                                in the middle of text. All the Lorem Ipsum generators on the Internet tend
                                to repeat predefined chunks as
                                necessary, making this the first true generator on the Internet. It uses a
                                dictionary of over 200 Latin words, combined with a handful of model
                                sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                            <p>Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur.</p>
                            <p>At vero eos et accusamus et iusto
                                odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
                                atque corrupti quos dolores et quas molestias excepturi sint occaecati
                                cupiditate non provident, similique sunt
                                in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                            <p>we denounce with righteous
                                indignation and dislike men who are so beguiled and demoralized by the
                                charms of pleasure of the moment, so blinded by desire, that they cannot
                                foresee the pain and trouble that are bound
                                to ensue; and equal blame belongs to those who fail in their duty through
                                weakness of will, which is the same as saying through shrinking from toil
                                and pain. These cases are perfectly simple and easy to distinguish.
                                In a free hour, when our power of choice is untrammelled and when nothing
                                prevents our being able to do what we like best, every pleasure is to be
                                welcomed and every pain avoided. But in certain circumstances and
                                owing to the claims of duty or the obligations of business it will
                                frequently occur that pleasures have to be repudiated and annoyances
                                accepted.</p>
                        </div>
                        <div class="donation-child-img">
                            <img src="images/donation.png" alt="../">
                        </div>
                    </div>
                    <h2>Itaque earum rerum hic tenetur a
                        sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut
                        perferendis doloribus asperiores repellat</h2>
                    <p>Nemo enim ipsam voluptatem quia voluptas
                        sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
                        ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia
                        dolor sit amet, consectetur,
                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                        magnam aliquam quaerat voluptatem.</p>
                    <p>But I must explain to you how all this
                        mistaken idea of denouncing pleasure and praising pain was born and I will give you
                        a complete account of the system, and expound the actual teachings of the great
                        explorer of the truth,
                        the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure
                        itself, because it is pleasure, but because those who do not know how to pursue
                        pleasure rationally encounter consequences that are extremely
                        painful. Nor again is there anyone who loves or pursues or desires to obtain pain of
                        itself, because it is pain, but because occasionally circumstances occur in which
                        toil and pain can procure him some great pleasure. To
                        take a trivial example, which of us ever undertakes laborious physical exercise</p>
                </div>
            </div>
        </div>
        </section>
        <!-- <===== End-Donation-section =====> -->

        <!-- <!=== start-contact-section =====> -->
        <div class="contactus">
            <section class="contact">
                <div class="container">
                    <div class="contact-title">
                        <h2>Stay connect with us</h2>
                        <p>Et harum quidem rerum facilis est et
                            expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
                            cumque</p>
                    </div>
                    <div class="contact-form">
                        <form id="contactform" method="post"
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="nema-and-number">
                                <input type="text" class="form-control" name="name" placeholder="First name">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="email-and-submit">
                                <input type=" text" class="form-control" name="number" placeholder="Phone">
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                            <textarea class="form-control" placeholder="Message"></textarea>
                            <?php
                            if(isset($txt_error) && $txt_error!=""){
                                echo "<p style='color: red; padding-bottom: 10px;'>".$txt_error."</p>";
                            }
                            ?>
                            <div class="contact-form-button">
                                <input type="submit" class="btn btn-primary" name="send" value="Send">
                            </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- <!=== End-contact-section =====> -->


    <!-- <!=== start-footer-section =====> -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <a href="index.php"><img src="images/footer-logo.png" alt="../"></a>
                <P>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                    necessary</P>
                <div class="footer-copyright"><a href="#" style="margin-right: 10px;">@ 2022 Donation
                        camp</a>/<a href="#" style="margin-right: 10px; margin-left:10px">Terms Of
                        Site</a>/<a href="#" style="margin-right: 10px; margin-left:10px">Legal</a></div>
                <div class="social-icon">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- <!=== End-footer-section =====> -->
    </div>

</body>

</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#donation_amount').on('input', function() {
        var donationAmount = $(this).val();
        $('#donation_total').text('Donation Total: ' + donationAmount);
    });
});
</script>
<!-- <script>
function checkLogin() {
    <?php if(!isset($_SESSION['loggedin'])): ?>
    alert("Please log in first.");
    window.location.href = '/view/login.php'; // Redirect to login page
    event.preventDefault(); // Prevent the form from submitting
    <?php endif; ?>
}
</script> -->