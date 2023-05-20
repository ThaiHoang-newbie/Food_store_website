<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Final PHP | Food Store Website</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Food Store <em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item active" href="about.php">About Us</a>
                                    <a class="dropdown-item" href="blog.php">Blog</a>
                                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                                    <a class="dropdown-item" href="terms.php">Terms</a>
                                </div>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Easy <em>Checkout</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label>Title:</label>
                                    <select data-msg-required="This field is required.">
                                        <option value="">-- Choose --</option>
                                        <option value="dr">Dr.</option>
                                        <option value="miss">Miss</option>
                                        <option value="mr">Mr.</option>
                                        <option value="mrs">Mrs.</option>
                                        <option value="ms">Ms.</option>
                                        <option value="other">Other</option>
                                        <option value="prof">Prof.</option>
                                        <option value="rev">Rev.</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <label>Name:</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label>Email:</label>
                                    <input type="text">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <label>Phone:</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <label>Address: </label>
                                    <input type="text">
                                </div>
                             
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label>Zip:</label>
                                    <input type="text">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <label>Country:</label>
                                    <select>
                                        <option value="">-- Choose --</option>
                                        <option value="">-- Choose --</option>
                                        <option value="">-- Choose --</option>
                                        <option value="">-- Choose --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label>Payment method</label>

                                    <select>
                                        <option value="">-- Choose --</option>
                                        <option value="bank">Bank account</option>
                                        <option value="cash">Cash</option>
                                        <option value="paypal">PayPal</option>
                                    </select>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label>Captcha</label>
                                    <input type="text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <div class="float-left">
                                            <a href="#">Back</a>
                                        </div>

                                        <div class="float-right">
                                            <a href="#">Finish</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>
                </div>

                <div class="col-md-4">
                    <ul class="list-group list-group-no-border">
                        <li class="list-group-item" style="margin:0 0 -1px">
                            <div class="row">
                                <div class="col-6">
                                    <strong>Name Product</strong>
                                </div>
                                <div class="col-6">
                                    <?php
                                    include('connectdb.php');
                                   
                                    $ordid = $_GET['id'];
                                    
                                

                                    $nsql  = "SELECT product_id FROM Orders where order_id = $ordid;";
                                    $result = $mysqli->query($nsql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $row = $result->fetch_assoc();
                                        $prdid = $row['product_id'];
                                        $namesql = "SELECT product_name FROM Product where product_id = $prdid;";
                                        $nameproduct = $mysqli->query($namesql);
                                        if ($nameproduct->num_rows > 0) {
                                            while ($row = $nameproduct->fetch_assoc()) {
                                    ?>
                                                <h5 class="text-right"><?php echo $row['product_name'] ?></h5>
                                    <?php }
                                        }
                                    } ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="margin:0 0 -1px">
                            <div class="row">
                                <div class="col-6">
                                <?php
                                    $ordid = $_GET['id'];

                                    $sql = "SELECT order_id,quantity,total_amount FROM Orders;";
                                    $kq = $mysqli->query($sql);

                                    if ($kq->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $kq->fetch_assoc()) {
                                            if ($row['order_id'] == $ordid) { ?>
                                    <strong>Quantity</strong>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-right"><?php echo $row['quantity'];?></h5>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item" style="margin:0 0 -1px">
                            <div class="row">
                                <div class="col-6">
                                    <h4><strong>Total</strong></h4>
                                </div>

                                <div class="col-6">
                                   
                                                <h4 class="text-right">$<?php echo $row['total_amount'];?></h4>
                                    <?php }
                                            
                                        }
                                    } ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <br>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Group 6 © 2023 Passerelles numériques Vietnam
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>

</html>