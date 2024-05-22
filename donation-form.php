<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';

include "./models/connect.php";
include "./models/donationModel.php";
session_start();


$user_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$logged_in = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;
if (!$logged_in) {
    header('Location: /WEBGK/view/login.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['donate'])) {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $donation_amount = $_POST['donation_amount'];
    $payment_method = $_POST['payment_method'];
    $result = checkUser($email);
    if ($result==TRUE) {
        $result1 = donate($first_name, $last_name, $email, $donation_amount, $payment_method);
        if ($result1==TRUE) {
            header('Location: /WEBGK/donation-success.php');
        }
        else {
            echo '<script>alert("Donation failed.")</script>';
        }
    }
    else {
        echo '<script>alert("User not found.")</script>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        body {font-family: Arial, sans-serif;}
        .container {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fafafa;
        }
        .header {
            background-color: #769593; /* Change to a fresh green color */
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
            background-color: #769593; /* Change to a fresh green color */
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
                <p>Thank you for your generous donation to the <strong style='color: red;'>Dona11 Organization</strong>.<br> Your support helps us continue our mission and reach our goals. We greatly appreciate your contribution and look forward to your continued support in the future.</p>            </div>
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- siteicons -->
    <link href="images/Sitelogo.png" rel="icon">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Template Main CSS File -->
    <link href="css/donation-form.css" rel="stylesheet" />
</head>

<body>
    <header id="header" class="">
        <div class="container">
            <nav id="navbar" class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/black-logo.png" alt="../" /></a>
                </div>
                <ul>
                    <li><a class="one" href="help-me.php">Help me </a></li>
                    <li><a class="one" href="about-us.php">About us</a></li>
                    <li><a class="one" href="donation.php" style="font-weight: 600;">Donation</a></li>
                    <li><a class="one" href="news.php">News</a></li>
                    <li class="dropdown one">
                        <a href="#"><span>Pages</span> <i class="fa fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="donation-form.php">Donation Form</a></li>
                            <li><a href="donation-success.php">Donation Success</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="wc-btn">
                    <?php if ($logged_in) : ?>
                    <div class="logged-in-user" style="display:flex">
                        <a style="margin-right:30px" href="/WEBGK/view/logout.php" class="btn btn-primary">Logout</a>
                        <p style="margin-right:30px;">Welcome, <?php echo $user_name; ?>!</p>
                    </div>
                    <?php else : ?>
                    <div class="wc-btn">
                        <a href="/WEBGK/view/login.php" class="btn btn-primary">Login</a>
                    </div>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <div class="main-wrapper">
        <!-- <===== Start-Donation-form-section =====> -->
        <section class="wc-donation-form">
            <div class="container">
                <div class="inner-success">
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <h2>Donation Form</h2>
                        <h4 style="margin-left: 10px;">Donate to: Dona11 Organization</h4>
                        <div class="wc-amount">
                            <p>Pick a donation amount</p>
                            <ul>
                                <li>
                                    <input type="radio" id="f-option" name="donation_amount" value="25">
                                    <label for="f-option">$ 25</label>
                                    <div class="check"></div>
                                </li>
                                <li>
                                    <input type="radio" id="s-option" name="donation_amount" value="50">
                                    <label for="s-option">$ 50</label>
                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                </li>

                                <li>
                                    <input type="radio" id="t-option" name="donation_amount" value="100">
                                    <label for="t-option">$ 100</label>
                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                </li>
                                <li>
                                    <input type="radio" id="q-option" name="donation_amount" value="1000">
                                    <label for="q-option">$ 1000</label>
                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                </li>
                                <!-- <li>
                                    <input type="radio" id="custom_amount" name=" selector">
                                    <label for="custom_amount">custom amount</label>
                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>

                                </li> -->
                            </ul>
                        </div>
                        <div class="donation-Occurence">
                            <h3>Donation Occurence</h3>
                            <label class="radio_btn">
                                <input type="radio" name="position_of_interest" value="Radio Field">
                                <span class="list-item-label">One time donation</span>
                            </label>
                            <label class="radio_btn">
                                <input type="radio" name="position_of_interest" value="Radio Field">
                                <span class="list-item-label">Recurring donation</span>
                            </label>
                        </div>
                        <div class="donation-information">
                            <h3>Donation Information</h3>
                            <input type="text" class="form-control" name="fname" placeholder="First Name">
                            <input type="text" class="form-control" name="lname" placeholder="Last Name">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <div class="select-box">
                                <div class="custom-select">
                                    <select>
                                        <option value="state">State</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="kerla">kerla</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Dehli">Dehli</option>
                                        <option value="sikkim">sikkim</option>
                                    </select>
                                </div>
                                <div class="custom-select">
                                    <select>
                                        <option value="Country">Country</option>
                                        <option value="india">india</option>
                                        <option value="America">America</option>
                                        <option value="Assam">canada</option>
                                        <option value="Gujarat">Rasiya</option>
                                        <option value="Chhattisgarh">landon</option>
                                        <option value="Goa">America</option>
                                    </select>
                                </div>
                            </div>
                            <h3>Payment method</h3>
                            <div class="custom-select google">
                                <select name="payment_method">
                                    <option value="Online banking">Online banking</option>
                                    <option value="Offline donation">Offline Donation</option>
                                    <option value="Credit Card">Credit Card </option>
                                </select>
                            </div>
                            <div class="contact-form-button">
                                <button class="btn btn-primary" type="submit" id="donate-button"
                                    name="donate">Donate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- <===== End-Donation-form-section =====> -->
    </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>