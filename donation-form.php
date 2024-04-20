<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donation-form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- siteicons -->
    <link href="images/Site-logo.png" rel="icon">
    <link href="css/donation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Template Main CSS File -->
    <link href="css/donationForm.css" rel="stylesheet">

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
                    <li><a class="one" href="portfolio.php">Portfolio</a></li>
                    <li><a class="one" href="contact-us.php">Contact us</a></li>
                    <li class="dropdown one"><a href="#"><span>Pages</span> <i class="fa fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="donation-form.php">Donation Form</a></li>
                            <li><a href="donation-success.php">Donation Success</a></li>
                            <li><a href="news-details.php">News Details</a></li>
                            <li><a href="portfolio-details.php">Portfolio Details</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="donation">
                    <a href="donation.php" class="">Donate</a>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header -->


    <div class="main-wrapper">
        <!-- <===== Start-Donation-form-section =====> -->
        <section class="donation-form">
            <div class="container">
                <div class="inner-success">
                    <h2>Order Success</h2>
                    <div class="inner-input">
                        <label>Donate to</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="amount">
                        <p>Pick a donation amount</p>
                        <a href="#">
                            <p>$ 25</p>
                        </a>
                        <a href="#">
                            <p>$ 50</p>
                        </a>
                        <a href="#">
                            <p>$ 100</p>
                        </a>
                        <a href="#">
                            <p>$ 1000</p>
                        </a>
                        <a href="#">
                            <p>custom amount</p>
                        </a>
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
                        <input type="text" class="form-control" name="name" placeholder="Name">
                        <input type="text" class="form-control" name="name" placeholder="Last Name">
                        <input type="email" class="form-control" name="Your email" placeholder="Email">
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
                            <input type="text" class="form-control" name="name" placeholder="Zip code">
                        </div>
                        <h3>Payment method</h3>
                        <div class="custom-select google">
                            <select>
                                <option value="Google pay">Google pay</option>
                                <option value="paytem">paytem</option>
                                <option value="g-pay">g-pay</option>
                            </select>
                        </div>


                        <div class="contact-form-button">
                            <a href="javascript:;" class="btn btn-primary">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <===== End-Donation-form-section =====> -->
    </div>

    <!-- Template Main JS File -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.ba-cond.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/main.js "></script>
</body>

</html>