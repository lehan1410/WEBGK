<?php
session_start();
$user_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$logged_in = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- siteicons -->
    <link href="images/Sitelogo.png" rel="icon">
    <link href="css/news.css" rel="stylesheet">
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
                    <li><a class="one" href="donation.php">Donation</a></li>
                    <li><a class="one" href="news.php" style="font-weight: 600;">News</a></li>
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
                    <div class="logged-in-user">
                        <span>Welcome, <?php echo $user_name; ?></span><a href="/WEBGK/view/logout.php"
                            class="btn btn-primary">Logout</a>

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
        <div class="page">
            <!-- <===== Start-news-section =====> -->
            <section class="wc-news">
                <div class="container">
                    <div class="news-title">
                        <h2>Latest News</h2>
                        <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta
                            nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere
                            possimus</p>
                    </div>
                    <div class="news-wrapper">
                        <div class="news-content">
                            <a href="news-details.php"><img src="images/news-1.png" alt="../"></a>
                            <p>10 jun,2022</p>
                            <a href="news-details.php"> </a>
                            <h2><a href="news-details.php">Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                                    reiciendis</a></h2>
                        </div>
                        <div class="news-content">
                            <a href="news-details.php"><img src="images/news-2.png" alt="../"></a>
                            <p>10 jun,2022</p>
                            <a href="news-details.php"></a>
                            <h2><a href="news-details.php">Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                                    reiciendis</a></h2>
                        </div>
                        <div class="news-content">
                            <a href="news-details.php"><img src="images/news-3.png" alt="../"></a>
                            <p>10 jun,2022</p>
                            <a href="news-details.php"></a>
                            <h2><a href="news-details.php">Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                                    reiciendis</a></h2>
                        </div>
                        <div class="news-content">
                            <a href="news-details.php"><img src="images/news-4.png" alt="../"></a>
                            <p>10 jun,2022</p>
                            <a href="news-details.php"></a>
                            <h2><a href="news-details.php">Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                                    reiciendis</a></h2>
                        </div>
                        <div class="news-content">
                            <a href="news-details.php"><img src="images/news-5.png" alt="../"></a>
                            <p>10 jun,2022</p>
                            <a href="news-details.php"></a>
                            <h2><a href="news-details.php">Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                                    reiciendis</a></h2>
                        </div>
                        <div class="news-content">
                            <a href="news-details.php"><img src="images/news-6.png" alt="../"></a>
                            <p>10 jun,2022</p>
                            <a href="news-details.php"></a>
                            <h2><a href="news-details.php">Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                                    reiciendis</a></h2>
                        </div>
                    </div>
                    <div class="wc-btn">
                        <a href="#" class="btn btn-primary">Load More</a>
                    </div>
                </div>
        </div>
    </div>
    </section>
    </div>
    <!-- <===== End-news-section =====> -->

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