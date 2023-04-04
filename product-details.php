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

  <!-- -- SweetAlert  -->
  <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
        #avt {
            border-radius: 70%;
            width: 30px;
            height: 30px;
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
              <li><a href="shoppingcart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
              <li><a href=""><img src="https://haycafe.vn/wp-content/uploads/2022/02/Hi%CC%80nh-avatar-trang-ne%CC%80n-den.jpg" alt="" id="avt"></a></li>
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
  <?php
  $id = $_GET["id"];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food_store";
  // Create connection
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
  }

  $sql = "SELECT * FROM product;";
  $result = $mysqli->query($sql);
  ?>
  <!-- ***** Call to Action Start ***** -->
  <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
      <?php if ($result->num_rows > 0) {
        // output data of each row
      ?>
        <div class="row">
          <?php while ($row = $result->fetch_assoc()) {
            if ($id == $row["product_id"]) { ?>
              <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                  <br>
                  <br>
                  <?php if (empty($row["newprice"])) { ?>
                    <h2><sup>$</sup><em><?php echo $row["price"]; ?></em></h2>
                  <?php } else { ?>
                    <h2><del><sup>$</sup><?php echo $row["price"]; ?></del> <sup>$</sup><em><?php echo $row["newprice"]; ?></em></h2>
                  <?php } ?>
                </div>
              </div>
          <?php break;
            }
          } ?>
        </div>
      <?php }  ?>
    </div>
  </section>
  <!-- ***** Call to Action End ***** -->

  <!-- ***** Fleet Starts ***** -->
  <section class="section">
    <div class="container">
      <br>
      <br>

      <div class="row">
        <div class="col-md-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="assets/images/product-image-1-1200x600.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/product-image-1-1200x600.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/product-image-1-1200x600.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <br>
        </div>
        <?php
        error_reporting(0);
        if ($_POST["submit"]) {
          // ID Seller
          $sql = "SELECT seller_id FROM sellerproduct where product_id= $id;";
          $kq = $mysqli->query($sql);
          $sl = $kq->fetch_assoc();
          $slid = $sl['seller_id'];
          // Total Amount
          $qa = $_POST['quantity'];
          $sql1 = "SELECT price,newprice FROM product where product_id= $id;";
          $pr = $mysqli->query($sql1);
          $pri = $pr->fetch_assoc();
          if (empty($pri['newprice'])) {
            $total = $qa * $pri['price'];
          } else {
            $total = $qa * $pri['newprice'];
          }
          $date_array = getdate();
          $date .= $date_array['year'] . "-";
          $date .= "0" . $date_array['mon'] . "-";
          $date .= $date_array['mday'];
          $status = "pending";
          // Insert data
          $insert = "INSERT INTO Orders(user_id,product_id,seller_id,order_date,total_amount,pstatus,quantity) VALUES (1,$id,$slid,'$date',$total,'$status',$qa)";
          $ins = $mysqli->query($insert);
          echo "<script> swal('Thành công', 'Bạn đã thực hiện hành động thành công', 'success');</script>";
        }
        ?>
        <div class="col-md-4">
          <div class="contact-form">
            <form action="#" id="contact" method="post">
              <div class="form-group">
                <h4><?php echo $row["product_name"]; ?></h4>
                <p><?php echo $row["description"]; ?></p>
              </div>

              <label>Extra 1</label>

              <select>
                <option value="0">Extra A</option>
                <option value="1">Extra B</option>
                <option value="2">Extra C</option>
              </select>

              <div class="row">
                <div class="col-md-6">
                  <form action="" method="post">
                    <label>Quantity</label>
                    <input type="text" name="quantity">
                    <input type="submit" name="submit" value="Submit">
                  </form>
                </div>
              </div>

              <div class="main-button">
                <a href="products.php">Back</a>
              </div>
            </form>

          </div>
          <br>
        </div>
      </div>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enquiry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="contact-us">
            <div class="contact-form">
              <form action="#" id="contact">
                <div class="row">
                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Enter full name" required="">
                    </fieldset>
                  </div>

                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Enter email address" required="">
                    </fieldset>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Enter phone" required="">
                    </fieldset>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                          <input type="text" class="form-control" placeholder="From date" required="">
                        </fieldset>
                      </div>

                      <div class="col-md-6">
                        <fieldset>
                          <input type="text" class="form-control" placeholder="To date" required="">
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Send Request</button>
        </div>
      </div>
    </div>
  </div>

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