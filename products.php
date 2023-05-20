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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .image-thumb {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        img{
            width: 200px;
            height: 200px;
        }
    </style>

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
                            <li><a onclick="window.location = '../Food_store_website/check_out/shoppingcart.php'"><i class="fa-solid fa-cart-shopping"></i></a></li>
                          
                            
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

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Products</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->

    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <?php
          
            include('../Food_store_website/check_out/connectdb.php');
            $sql = "SELECT * FROM product;";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
            ?>
                <div class="row">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="col-lg-3">
                            <div class="trainer-item">

                                <div class="image-thumb">
                                    <img src="<?php echo $row["image_url"]; ?>" alt="">
                                </div>
                                <div class="down-content">
                                    <span>
                                        <?php if (empty($row["newprice"]) or $row["newprice"] == 0) { ?>
                                            <sup>$</sup><em><?php echo $row["price"]; ?></em>
                                        <?php } else { ?>
                                            <del><sup>$</sup><?php echo $row["price"]; ?></del> <sup>$</sup><em><?php echo $row["newprice"]; ?></em>
                                        <?php } ?>
                                    </span>

                                    <h4><?php echo $row["product_name"]; ?></h4>

                                    <p><?php echo $row["description"]; ?></p>

                                    <ul class="social-icons">
                                        <li><a href="product-details.php?id=<?php echo $row["product_id"]; ?>">+ Order</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <?php  }
                } else {
                    echo "0 results";
                }
                $mysqli->close();
                ?>
                </div>

    </section>
    <!-- ***** Fleet Ends ***** -->


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