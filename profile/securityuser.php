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
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/css/nav_profile.css">
</head>

<body>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">

            <div class="nav nav-borders__left">
                <a class="nav-link ms-0" onclick="window.location = '../profile/user.php'" target="__blank">Profile</a>
                <a class="nav-link active ms-0" onclick="window.location = '../profile/securityuser.php'" target="__blank">Security</a>
            </div>

            <div class="nav nav-borders__right">
                <a class="nav-link ms-0" onclick="window.location = 'http://localhost/Food_store_website/'" target="__blank">Back</a>
            </div>

        </nav>
        <hr class="mt-0 mb-4">
        <br>
        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>



                    <div class="card-body">
                        <form method="POST">
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input name="current_pass" class="form-control" id="currentPassword" type="password" placeholder="Enter current password" minlength="6" maxlength="20">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input name="new_pass" class="form-control" id="newPassword" type="password" placeholder="Enter new password" minlength="8" maxlength="20">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input name="confirm_pass" class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password" minlength="8" maxlength="20">
                            </div>
                            <button class="btn btn-primary" type="submit" name="save_btn">Save</button>
                        </form>
                    </div>
                </div>




                <?php
                if (isset($_POST['save_btn'])) {
                    $current_pass = $_POST['current_pass'];
                    $new_pass = $_POST['new_pass'];
                    $confirm_pass = $_POST['confirm_pass'];
                    $email_user = $_SESSION['email_user'];

                    include("../Sign_up/connect_db.php");

                    $select_query = "SELECT user_password FROM user WHERE email = '$email_user'";
                    $result = mysqli_query($conn, $select_query);
                    $user = mysqli_fetch_assoc($result);

                    if (!empty($user) && isset($user['user_password']) && $current_pass === $user['user_password']) {
                        if ($new_pass === $confirm_pass) {
                            $update_query = "UPDATE user SET user_password = '$new_pass' WHERE email = '$email_user'";
                            mysqli_query($conn, $update_query);
                            echo "<script>alert('Update password successful')</script>";
                        } else {
                            echo "<script>alert('Wrong confirm password')</script>";
                        }
                    } else {
                        echo "<script>alert('Wrong current password')</script>";
                    }
                }
                ?>





                <?php
                if (isset($_POST['delete_btn'])) {

                    $email_user = $_SESSION['email_user'];

                    include("../Sign_up/connect_db.php");
                    $select_query = "DELETE FROM user WHERE email = '$email_user'";
                    $result = mysqli_query($conn, $select_query);

                    if (mysqli_affected_rows($conn) > 0) {
                        echo "<script>alert('Delete successful')</script>";
                        header("Refresh: 1.5; url=http://localhost/FOOD_STORE_WEBSITE/sign_up/login.php");
                    } else {
                        echo "<script>alert('Delete failed')</script>";
                    }
                }
                ?>

                <!-- Delete account card-->
                <div class="card mb-4">
                    <form action="" method="POST">
                        <div class="card-header">Delete Account</div>
                        <div class="card-body">
                            <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                            <button class="btn btn-danger-soft text-danger" name="delete_btn" type="submit">I understand, delete my account</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>