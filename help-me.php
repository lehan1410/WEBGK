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
            header('Location: \WEBGK\donation.php');
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
    <title>Help-me</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- siteicons -->
    <link href="images/Sitelogo.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Template Main CSS File -->
    <link href="css/help-me.css" rel="stylesheet" />
</head>

<body>
    <header id="header" class="">
        <div class="container">
            <nav id="navbar" class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/black-logo.png" alt="../" /></a>
                </div>
                <ul>
                    <li><a class="one" href="help-me.php" style="font-weight: 600;">Help me </a></li>
                    <li><a class="one" href="about-us.php">About us</a></li>
                    <li><a class="one" href="donation.php">Donation</a></li>
                    <li><a class="one" href="news.php">News</a></li>
                    <li class="dropdown one">
                        <a href="#"><span>Pages</span> <i class="fa fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="donation-form.php">Donation Form</a></li>
                            <li><a href="donation-success.php">Donation Success</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="donation">
                    <a href="\WEBGK\view\login.php" class="btn btn-primary">Login</a>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <div class="main-wrapper">
        <div class="page">
            <!-- <===== Start-help-me-section =====> -->
            <section class="wc-help-me">
                <div class="container">
                    <div class="main-help-content">
                        <h2 class="title">Help me write</h2>
                        <div class="help-me-wrapper">
                            <div class="help-me-image">
                                <img src="images/help.png" alt="../" />
                            </div>
                            <div class="help-me-p">
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio
                                    cumque nihil impedit quo minus id quod maxime placeat
                                    facere possimus, omnis voluptas assumenda est, omnis
                                    dolor repellendus. Temporibus autem quibusdam et aut
                                    officiis debitis aut rerum necessitatibus saepe eveniet
                                    ut et voluptates repudiandae sint et molestiae non
                                    recusandae. Itaque earum rerum hic tenetur a sapiente
                                    delectus, ut aut reiciendis voluptatibus maiores alias
                                    consequatur aut perferendis doloribus asperiores
                                    repellat."
                                </p>
                                <p>
                                    When our power of choice is untrammelled and when
                                    nothing prevents our being able to do what we like best,
                                    every pleasure is to be welcomed and every pain avoided.
                                    But in certain circumstances and owing to the claims of
                                    duty or the obligations of business it will frequently
                                    occur that pleasures have to be repudiated and
                                    annoyances accepted.
                                </p>
                                <p>
                                    Et harum quidem rerum facilis est et expedita
                                    distinctio. Nam libero tempore, cum soluta nobis est
                                    eligendi optio cumque nihil impedit quo minus id quod
                                    maxime placeat facere possimus, omnis voluptas assumenda
                                    est, omnis dolor repellendus. Temporibus autem quibusdam
                                    et aut officiis debitis aut rerum necessitatibus saepe
                                    eveniet ut et voluptates repudiandae sint et molestiae
                                    non recusandae. Itaque earum rerum hic tenetur a
                                    sapiente delectus, ut aut reiciendis voluptatibus
                                    maiores alias consequatur aut perferendis doloribus
                                    asperiores repellat.
                                </p>
                            </div>
                        </div>
                        <p>
                            All the Lorem Ipsum generators on the Internet tend to
                            repeat predefined chunks as necessary, making this the first
                            true generator on the Internet. It uses a dictionary of over
                            200 Latin words, combined with a handful of model sentence
                            structures, to generate Lorem Ipsum which looks reasonable.
                            The generated Lorem Ipsum is therefore always free from
                            repetition, injected humour, or non-characteristic words etc
                        </p>
                        <p>
                            All the Lorem Ipsum generators on the Internet tend to
                            repeat predefined chunks as necessary, making this the first
                            true generator on the Internet. It uses a dictionary of over
                            200 Latin words, combined with a handful of model sentence
                            structures, to generate Lorem Ipsum which looks reasonable.
                            The generated Lorem Ipsum is therefore always free from
                            repetition, injected humour, or non-characteristic words etc
                        </p>
                    </div>
                    <div class="wc-story-info">
                        <h2>Story of Rohan</h2>
                        <div class="story-wrapper">
                            <div class="story-image">
                                <img src="images/story-info.png" alt="../" />
                            </div>
                            <div class="story-content">
                                <p>
                                    At vero eos et accusamus et iusto odio dignissimos
                                    ducimus qui blanditiis praesentium voluptatum deleniti
                                    atque corrupti quos dolores et quas molestias excepturi
                                    sint occaecati cupiditate non provident, similique sunt
                                    in culpa qui officia deserunt mollitia animi, id est
                                    laborum et dolorum fuga.
                                </p>
                                <p>
                                    Et harum quidem rerum facilis est et expedita
                                    distinctio. Nam libero tempore, cum soluta nobis est
                                    eligendi optio cumque nihil impedit quo minus id quod
                                    maxime placeat facere possimus,
                                    <span>omnis voluptas assumenda est, omnis dolor
                                        repellendus. Temporibus autem quibusdam </span>et aut officiis debitis aut rerum
                                    necessitatibus saepe
                                    eveniet ut et voluptates repudiandae
                                </p>
                                <p>
                                    Sint et molestiae non recusandae. Itaque earum rerum hic
                                    tenetur a sapiente delectus, ut aut reiciendis
                                    voluptatibus maiores alias consequatur aut perferendis
                                    doloribus asperiores repellat
                                </p>
                                <p>
                                    we denounce with righteous indignation and dislike men
                                    who are so beguiled and demoralized by the charms of
                                    pleasure of the moment, so blinded by desire, that they
                                    cannot foresee the pain and trouble that are bound to
                                    ensue; and equal blame belongs to those who fail in
                                    their duty through weakness of will, which is the same
                                    as saying through shrinking from toil and pain.
                                </p>
                            </div>
                        </div>
                        <h3>
                            Various versions have evolved over the years, sometimes by
                            accident, sometimes on purpose
                        </h3>
                        <p class="last">
                            Nor again is there anyone who loves or pursues or desires to
                            obtain pain of itself, because it is pain, but because
                            occasionally circumstances occur in which toil and pain can
                            procure him some great pleasure. To take a trivial example,
                            which of us ever undertakes laborious physical exercise,
                            except to obtain some advantage from it? But who has any
                            right to find fault with a man who chooses to enjoy a
                            pleasure that has no annoying consequences, or one who
                            avoids a pain that produces no resultant pleasure?"
                        </p>
                        <p class="last">
                            There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration in some
                            form, by injected humour, or randomised words which don't
                            look even slightly believable.
                        </p>
                    </div>
                    <div class="bredcum">
                        <div class="bredcum-content">
                            <h2>We need your support</h2>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium doloremque laudantium, totam rem
                                aperiam, eaque ipsa quae ab illo inventore veritatis et
                                quasi architecto beatae vitae dicta sunt explicabo. Nemo
                                enim ipsam voluptatem quia voluptas sit aspernatur aut
                                odit aut fugit, sed quia consequuntur magni dolores eos
                                qui ratione voluptatem sequi nesciunt.
                            </p>
                        </div>
                        <a href="donation.php" class="btn btn-primary">Donate</a>
                    </div>


                </div>
            </section>
            <!-- <===== End-help-me-section =====> -->

            <!-- <===== start-as-donation-section =====> -->
            <section class="as-donation">
                <div class="container">

                    <h2>Where do go for Your donation?</h2>
                    <div class="donation-content">
                        <div class="donation-p">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p>
                                All the Lorem Ipsum generators on the Internet tend to
                                repeat predefined chunks as necessary, making this the
                                first true generator on the Internet.
                            </p>
                        </div>
                        <div class="faq_wrapper">
                            <div class="faq_item_dropdown">
                                <a href="#"><span>Documetation</span><i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration
                                            in some form, by injected humour, or randomised
                                            words which don't look even slightly believable.
                                        </p>
                                    </li>

                                </ul>

                            </div>
                            <div class="faq_item_dropdown">
                                <a href="#"><span>school necessity</span><i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration
                                            in some form, by injected humour, or randomised
                                            words which don't look even slightly believable.
                                        </p>
                                    </li>

                                </ul>

                            </div>
                            <div class="faq_item_dropdown">
                                <a href="#"><span>Operational cost</span><i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration
                                            in some form, by injected humour, or randomised
                                            words which don't look even slightly believable.
                                        </p>
                                    </li>

                                </ul>

                            </div>



                        </div>
                    </div>


                </div>
            </section>
            <!-- <===== End-as-donation-section =====> -->

            <!-- <!=== start-contact-section =====> -->

            <!-- <!=== start-contact-section =====> -->
            <div class="wc-contactus">
                <section class="wc-contact">
                    <div class="container">
                        <div class="contact-title">
                            <h2>Stay connect with us</h2>
                            <p>Et harum quidem rerum facilis est et expedita
                                distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque</p>
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
                                <textarea class="form-control" name="message" placeholder=" Message"></textarea>
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
                </section>
            </div>
        </div>
        <!-- <!=== End-contact-section =====> -->

        <!-- <!=== start-footer-section =====> -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
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
                </div>
            </div>
        </footer>
        <!-- <!=== End-footer-section =====> -->
    </div>
</body>

</html>