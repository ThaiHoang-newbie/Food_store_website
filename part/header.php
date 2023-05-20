<? session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>


<body>
    .<div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">Food Store <em> Website</em></a>
                    <!-- ***** Logo End ***** -->


                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    
                        <?php
                        $email_user = $_SESSION['email_user'];
                        include("./connect.php");
                        $user_type_query = "SELECT * FROM user WHERE email = ?";
                        $stmt = mysqli_prepare($conn, $user_type_query);
                        mysqli_stmt_bind_param($stmt, "s", $email_user);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $user = mysqli_fetch_assoc($result);
                        mysqli_stmt_close($stmt);
                        $userType = $user['user_type'];

                        if ($userType === 'Seller') {
                            echo '<li><a href="products.php">My products</a></li>';
                        }
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item active" href="about.php">About Us</a>
                                <a class="dropdown-item" href="blog.php">Blog</a>
                                <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                                <a class="dropdown-item" href="terms.php">Terms</a>
                            </div>
                        </li>
                        <li><a href="http://localhost/Food_store_website/products.php">Products</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                        <li><a onclick="window.location = '../Food_store_website/check_out/shoppingcart.php'"><i class="fa-solid fa-cart-shopping"></i></a></li>
                        <script>
                            function dir_infor() {
                                window.location.href = "http://localhost/Food_store_website/profile/user.php";
                            }
                            var img = document.querySelector("avt");
                            img.addEventListener("click", dir_infor);
                        </script>

                        <li class="avt">
                            <?php // Avatar
                            if (isset($_SESSION['email_user'])) {
                                require('./Sign_up/connect_db.php');
                                $email_user = $_SESSION['email_user'];

                                $select_avt = "SELECT `avatar` FROM `user` WHERE `email` = '$email_user'";
                                $result = mysqli_query($conn, $select_avt);
                                $_SESSION['email_user'] = $email_user;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <img onclick="dir_infor()" src=" <?php if ($row['avatar'] == null) { // Don't have any avt
                                                                            echo "https://iphonecugiare.com/wp-content/uploads/2020/03/84156601_1148106832202066_479016465572298752_o.jpg";
                                                                        } else { // User's avatar
                                                                            echo $row['avatar'];
                                                                        }
                                                                        ?>" id="avt" alt="Avatar">
                            <?php
                                }
                            }
                            ?>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>