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
            <h2>Feel free to <em>Contact Us</em></h2>
            <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ***** Features Item Start ***** -->
  <section class="section" id="features">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>contact <em> info</em></h2>
            <img src="assets/images/line-dec.png" alt="waves">

          </div>
        </div>

        <div class="col-md-4">
          <div class="icon">
            <i class="fa fa-phone"></i>
          </div>

          <h5><a href="#">0123 456 789</a></h5>

          <br>                                                                                                                                      
        </div>

        <div class="col-md-4">
          <div class="icon">
            <i class="fa fa-envelope"></i>
          </div>

          <h5><a href="#">PNV@gmail.com</a></h5>

          <br>
        </div>

        <div class="col-md-4">
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>

          <h5>101B Le Huu Trac street, Da Nang city</h5>

          <br>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Item End ***** -->

  <!-- ***** Contact Us Area Starts ***** -->
  <section class="section" id="contact-us" style="margin-top: 0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d878.9702855808808!2d108.24095370203649!3d16.060566544772243!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1678754459265!5m2!1svi!2s" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
            <form id="contact" action="" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                  </fieldset>
                </div>
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="subject" type="text" id="subject" placeholder="Subject">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="main-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Contact Us Area Ends ***** -->

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