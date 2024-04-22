<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function checkForm($name, $email, $number, $subject, $message ){
    if(empty($name) || empty($email) || empty($number) || empty($subject) || empty($message)){
        echo '<script>alert("Please enter complete information.")</script>';
        return false; // Some fields are empty
    }
    return true; // All fields are filled
}
session_start();
ob_start();
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
        if ($result==TRUE) {
            header('Location: \WEBGK\about-us.php');
        }else {
            $txt_error = "Please enter complete information.";
        }
    }
    
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $mail->Body    = "Dear $name,<br><br>Thank you for your submission.<br><br>Best regards,<br>Group 11";
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>About-us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/about-us.css">
</head>

<body class="main-about-us">
    <!-- Start-header -->
    <header id="header" class="">
        <div class="container">
            <!-- Start navbar -->
            <nav id="navbar" class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/black-logo.png" alt="../"></a>
                </div>
                <ul>
                    <li><a href="help-me.php">Help me </a></li>
                    <li><a href="about-us.php" style="font-weight: 600;">About us</a></li>
                    <li><a href="donation.php">Donation</a></li>
                    <li><a href="news.php">News</a></li>
                    <li class="dropdown one"><a href="#"><span>Pages</span> <i class="fa fa-chevron-down"></i></a>
                        <ul>
                            <li><a class="one" href="donation-form.php">Donation Form</a></li>
                            <li><a class="one" href="donation-success.php">Donation Success</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="wc-btn">
                    <a href="donation.php" class="btn btn-primary">Donate</a>
                </div>
            </nav>
            <!-- End navbar -->
        </div>
    </header>
    <!-- End Header -->

    <div class="main">
        <div class="page">
            <!-- Start-about-us-section -->
            <section class="wc-about-us">
                <div class="wc-about-bg" style="background-image: url(images/about-us.png);">
                    <h2>We Make a Difference in their Life</h2>
                </div>
            </section>
            <!-- End-about-us-section -->

            <!-- Start-about-us-section -->
            <section class="about-us">
                <div class="container">
                    <h2 class="title">Et harum quidem rerum facilis est et expedita distinctio.
                        Nam libero tempore, cum soluta nobis est eligendi optio
                    </h2>
                    <div class="about-content">
                        <div class="left-content">
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything embarrassing hidden in the middle of text.
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                necessary,
                                making this the first true generator on the Inte</p>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form,
                                by injected humour, or randomised words which don't look even slightly believable. If
                                you are going to
                                use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                                hidden in the middle of text.
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                necessary, making this
                                the first true generator on the Inte</p>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        </div>

                        <div class="right-content">
                            <img src="images/about.png" alt="../">
                        </div>
                    </div>
                </div>
            </section>
            <!-- End-about-us-section -->

            <!-- Start-what-we-section -->
            <section class="what-we">
                <div class="container">
                    <div class="wc-what-we">
                        <h2>What we do now</h2>
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                            nisi ut aliquid ex ea commodi consequatur?
                            Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                            consequatur</p>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti
                            atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                            provident, similique sunt in culpa
                            qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum
                            facilis est et expedita distinctio.</p>
                    </div>
                </div>
            </section>

            <div class="main-wc-what">
                <div class="container">
                    <div class="left-content">
                        <img src="images/about-us-2.png" alt="../">
                    </div>
                    <div class="right-content">
                        <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by
                            the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the
                            pain and trouble that are bound to ensue;
                            and equal blame belongs to those who fail in their duty through weakness of will, which is
                            the same as saying through shrinking from toil and pain. </p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't look
                            even slightly believable. If you are going
                            to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                            hidden in the middle of text.</p>
                    </div>
                </div>
            </div>
            <!-- End-what-we-section -->

            <!-- Start-chariti-page-wrapper-section -->
            <div class="wc-chariti">
                <div class="container-fluid">
                    <div class="project-img">
                        <div class="charities-img">
                            <img src="images/gallery-1.png" alt="../">
                        </div>
                        <div class="charities-img">
                            <img src="images/gallery-2.png" alt="../">
                        </div>
                        <div class="charities-img">
                            <img src="images/gallery-3.png" alt="../">
                        </div>
                        <div class="charities-img">
                            <img src="images/gallery-4.png" alt="../">
                        </div>
                        <div class="charities-img">
                            <img src="images/gallery-5.png" alt="../">
                        </div>
                        <div class="charities-img">
                            <img src="images/gallery-6.png" alt="../">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End-chariti-page-wrapper-section -->

            <!-- Start-contact-section -->
            <div class="wc-contactus">
                <section class="wc-contact">
                    <div class="container">
                        <div class="contact-title">
                            <h2>Stay connect with us</h2>
                            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta
                                nobis est eligendi optio cumque</p>
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
            <!-- Start-footer-section -->
            <footer class="footer">
                <div class="container">
                    <div class="footer-content">
                        <a href="index.php"><img src="images/footer-logo.png" alt="../"></a>
                        <P>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary
                        </P>
                        <div class="footer-copyright"><a href="#" style="margin-right: 10px;">@ 2022 Donation camp</a>
                            /<a href="#" style="margin-right: 10px; margin-left:10px">Terms Of Site</a>
                            /<a href="#" style="margin-right: 10px; margin-left:10px">Legal</a></div>

                        <div class="social-icon">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End-footer-section -->
        </div>
</body>

</html>