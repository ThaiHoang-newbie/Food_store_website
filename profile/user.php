<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/nav_profile.css">
    <link rel="stylesheet" href="../assets/css/user.css">

</head>

<body>
    <div class="container-xl px-4 mt-4">
        <nav class="nav nav-borders">

            <div class="nav nav-borders__left">
                <a class="nav-link active ms-0" onclick="window.location = '../profile/user.php'" target="__blank">Profile</a>
                <a class="nav-link ms-0" onclick="window.location = '../profile/securityuser.php'" target="__blank">Security</a>
            </div>

            <div class="nav nav-borders__right">
                <a class="nav-link ms-0" onclick="window.location = 'http://localhost/Food_store_website/'" target="__blank">Back</a>
            </div>

        </nav>
        <hr class="mt-0 mb-4">
        <br>
        <div class="row">
            <?php
            include('../Sign_up/connect_db.php');
            if (isset($_SESSION['email_user'])) {
                $email_user = $_SESSION['email_user'];
                $sql = "SELECT * FROM `User` where `email` = '$email_user';";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="col-md-12">
                            <div class="card mb-12 mb-xl-0">
                                <div class="card-header">User Information</div>
                                <div class="card-body text-center">

                                    <img id="avatar" title="Upload your avatar" class="img-account-profile rounded-circle mb-2" src="
                                    <?php if ($row['avatar'] == null) { // Don't have any avt
                                        echo "https://iphonecugiare.com/wp-content/uploads/2020/03/84156601_1148106832202066_479016465572298752_o.jpg";
                                    } else { // User's avatar
                                        echo $row['avatar'];
                                    } ?>" alt="avatar">

                                    <div class="font-italic text-muted mb-4"><b>Name: </b><?php echo $row['username'] ?></div>
                                    <div class="font-italic text-muted mb-4"><b>Email: </b><?php echo $row['email'] ?></div>
                                    <div class="font-italic text-muted mb-4"><b>Phone Number: </b><?php echo $row['phone_number'] ?></div>
                                    <div class="font-italic text-muted mb-4"><b>Address: </b><?php echo $row['address'] ?></div>
                                    <button class="btn btn-primary" type="button" onclick="dir_infor()">Edit Profile</button>
                                </div>
                            </div>
                        </div>
            <?php }
                }
            } ?>
        </div>
        <hr class="mt-0 mb-4">
    </div>
</body>
<script src="../assets/js/dir_infor.js"></script>

</html>