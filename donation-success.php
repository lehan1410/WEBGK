<?php 
    include './models/donationsuccessModel.php';
    include "./models/connect.php";
    session_start();
    $user_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    $logged_in = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $donations = getDonation($email);
    $recentDonations = getRecentDonations(10);
    $donationSummary = getDonationSummaryByEmail();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donation-success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- siteicons -->
    <link href="images/Sitelogo.png" rel="icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Template Main CSS File -->
    <link href="css/donationSuccess.css" rel="stylesheet">

</head>

<body>
    <!-- start-header -->
    <header id="header" class="">
        <div class="container">
            <nav id="navbar" class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/black-logo.png" alt="../"></a>
                </div>
                <ul>
                    <li><a class="one" href="help-me.php">Help me </a></li>
                    <li><a class="one" href="about-us.php">About us</a></li>
                    <li><a class="one" href="donation.php" style="font-weight: 600;">Donation</a></li>
                    <li><a class="one" href="news.php">News</a></li>
                    <li class="dropdown one"><a href="#"><span>Pages</span> <i class="fa fa-chevron-down"></i></a>
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
        <!-- <===== Start-Donation-success-section =====> -->
        <section class="donation-success">
            <div class="container">
                <div class="inner-success">
                    <h2>Donation Success</h2>
                    <h3 class="title">Donation Successful</h3>
                    <p>Your Donation has been placed successfully, please review the Donation below</p>
                    <h3 class="title">Donation Detail</h3>
                    <div class="details-table">
                        <table>
                            <tr>
                                <th>Full Name</th>
                                <th>
                                    <?php
                                    foreach ($donations as $donation) {
                                        echo $donation['first_name'] . ' ' . $donation['last_name'];
                                    }
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <?php
                                    foreach ($donations as $donation) {
                                        echo $donation['email'];
                                    }
                                    ?>
                                </td>
                            <tr>
                                <td>Gateway</td>
                                <td>
                                    <?php
                                    foreach ($donations as $donation) {
                                        if ($donation['payment_method'] == 'Offline Donation') {
                                            echo 'Offline';
                                        } else {
                                            echo 'Online';
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Transaction status</td>
                                <td>
                                    <?php
                                    foreach ($donations as $donation) {
                                        if ($donation['payment_method'] != 'Offline Donation') {
                                            echo 'Pending payment';
                                        } else {
                                            echo 'Success';
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Donation total</td>
                                <td><span>$</span>
                                    <?php
                                    foreach ($donations as $donation) {
                                        echo $donation['donation_total'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>USD</td>
                            </tr>
                        </table>
                    </div>
                    <div class="payment-tabel">
                        <h3>Top 10 recent donators</h3>
                        <div class="payment-tabel-success">
                            <table>
                                <tr>
                                    <th>Full name</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                <?php
                                if(isset($recentDonations) && !empty($recentDonations)){
                                    foreach ($recentDonations as $donation) {
                                        echo '<tr>';
                                        echo '<td>' . $donation['first_name'] . ' ' . $donation['last_name'] . '</td>';
                                        echo '<td>' . $donation['donation_total'] . '</td>';
                                        echo '<td>' . $donation['donation_total'] . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                else{
                                    echo '<tr>';
                                    echo '<td style="text-align:center" colspan="3">No recent donations</td>';
                                    echo '</tr>';
                                }
                                
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <===== End-Donation-section =====> -->
    </div>
</body>

</html>