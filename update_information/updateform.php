<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/update_form.css">
    </link>
</head>

<body>
    <video autoplay="" muted="" loop="" id="bg-video">
        <source src="assets/images/video.mp4" type="video/mp4">
    </video>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4> Update Data by ID of User</h4>
                    </div>
                    <div class="card-body">

                        <form action="update.php" method="POST">


                            <div class="form-group mb-3">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>


                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>



                            <div class="form-group mb-3">
                                <button type="submit" name="update-info" class="btn btn-primary">Update Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>