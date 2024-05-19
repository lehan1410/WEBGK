<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- siteicons -->
    <link href="images/Site-logo.png" rel="icon" />

    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
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
                <div class="donation">
                    <a href="\WEBGK\view\login.php" class="btn btn-primary">Login</a>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <div class="main-wrapper">
        <!-- <===== Start-Donation-form-section =====> -->
        <section class="wc-donation-form">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="inner-success">
                            <h2>Donation Form</h2>
                            <div class="inner-input">
                                <label>Donate to</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="wc-amount">
                                <p>Pick a donation amount</p>
                                <ul>
                                    <li>
                                        <input type="radio" id="f-option" name="selector">
                                        <label for="f-option">$ 25</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="s-option" name="selector">
                                        <label for="s-option">$ 50</label>
                                        <div class="check">
                                            <div class="inside"></div>
                                        </div>
                                    </li>

                                    <li>
                                        <input type="radio" id="t-option" name="selector">
                                        <label for="t-option">$ 100</label>
                                        <div class="check">
                                            <div class="inside"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" id="q-option" name="selector">
                                        <label for="q-option">$ 1000</label>
                                        <div class="check">
                                            <div class="inside"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" id="custom_amount" name=" selector">
                                        <label for="custom_amount">custom amount</label>
                                        <div class="check">
                                            <div class="inside"></div>
                                        </div>
                                        <input type="text" class="form-control" id="custom_amount_input"
                                            placeholder="Enter custom amount" style="display: none;">
                                    </li>


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
                                <input type="text" class="form-control" name="name" placeholder="Full Name">
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
                </div>
            </div>
        </section>
        <!-- <===== End-Donation-form-section =====> -->
    </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#custom_amount').on('click', function(e) {
        $('#custom_amount_input').show();
    });
});
</script>