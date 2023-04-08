<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/update_form.css">
    </link>
</head>

<body>
    <video autoplay="" muted="" loop="" id="bg-video">
        <source src="../assets/images/video.mp4" type="video/mp4">
    </video>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <?php
                include("../Sign_up/connect_db.php");

                if (isset($_SESSION['email_user'])) {
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['email_user']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }

                $email_user = $_SESSION['email_user'];
                $select_avt = "SELECT * FROM `user` WHERE `email` = '$email_user'";
                $result = mysqli_query($conn, $select_avt);
                while ($row = mysqli_fetch_assoc($result)) {
                    // Show old infor
                ?>

                    <div class="card mt-5">
                        <div class="card-header">
                            <h4> Update <?php echo $row['email']; ?> account</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST">

                                <div class="form-group mb-3">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $row['user_password']; ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Phone Number</label>
                                    <input type="phone" name="phone_number" class="form-control" value="<?php echo $row['phone_number']; ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
                                </div>


                                <div class="form-group mb-3">
                                    <button type="submit" name="update-info" class="btn btn-primary">Update Data</button>
                                </div>

                            </form>
                        </div>
                    </div>

                <?php }
                ?>


                <?php
                if (isset($_POST['update-info'])) {
                    $name = $_POST['username'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone_number'];
                    $address = $_POST['address'];

                    $query = "UPDATE `user` SET `username`='$name', `user_password`='$password',
                    `phone_number`='$phone', `address`='$address' 
                    WHERE email='$email_user' ";

                    $query_run = mysqli_query($conn, $query);

                    if ($query_run) {
                        echo "<script>alert('Update successful!')</script>";
                        echo "<script>
                        setTimeout(
                            function(){window.location.href='http://localhost/Food_store_website/update_information/updateform.php'}, 1000);
                        </script>";
                    } else {
                        echo "<script>alert('Update failed!')</script>";
                    }
                }
                ?>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>