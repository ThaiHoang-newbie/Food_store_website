<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/login.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
  <title>Login Page</title>
</head>

<body>

  <div class="login-card-container">

    <div class="login-card">
      <!-- <div class="login-card-logo">
        <img src="logo.png" alt="logo">
      </div> -->

      <div class="login-card-header">
        <h1>Log in</h1>
        <div>Please login to use my website</div>
      </div>

      <form class="login-card-form" method="POST">
        <div class="form-item">
          <span class="form-item-icon material-symbols-rounded">mail</span>
          <input type="text" placeholder="Enter Email" id="emailForm" name="email" autofocus required>
        </div>

        <div class="form-item">
          <span class="form-item-icon material-symbols-rounded">lock</span>
          <input type="password" placeholder="Enter Password" id="passwordForm" name="password" required>
        </div>

        <div class="form-item-other">
          <div class="checkbox">
            <input type="checkbox" name="rememberme" id="rememberMeCheckbox" checked>
            <label for="rememberMeCheckbox">Remember me</label>
          </div>

          <a href="#">I forgot my password!</a>
        </div>

        <button type="submit" name="btn-login">Sign In</button>
      </form>

      <div class="login-card-footer">
        Don't have an account? <a href="./sign_up.php">Create now</a>
      </div>

    </div>
  </div>
  </div>

  <?php
  // Login


  if (isset($_POST['btn-login'])) {
    include('../Sign_up/connect_db.php');
    $email_input = $_POST['email'];
    $password_input = $_POST['password'];

    // Prevent MySQL injection
    $select_log_user_email = "SELECT `email` FROM `user` WHERE `email` = ?";
    $stmt_email = mysqli_prepare($conn, $select_log_user_email);
    mysqli_stmt_bind_param($stmt_email, "s", $email_input);
    mysqli_stmt_execute($stmt_email);
    mysqli_stmt_store_result($stmt_email);
    $e_fetch = mysqli_stmt_fetch($stmt_email);


    $select_log_user_pass = "SELECT `user_password` FROM `user` WHERE `user_password` = ?";
    $stmt_pass = mysqli_prepare($conn, $select_log_user_pass);
    mysqli_stmt_bind_param($stmt_pass, "s", $password_input);
    mysqli_stmt_execute($stmt_pass);
    mysqli_stmt_store_result($stmt_pass);
    $p_fetch = mysqli_stmt_fetch($stmt_pass);



    if (!empty($e_fetch)) {
      if (!empty($p_fetch)) {

        include('./connect.php');

        $select_id = "SELECT `user_id` FROM `user` WHERE `user_password` = ? AND `email` = ?";
        $stmt_id = mysqli_prepare($conn, $select_id);
        mysqli_stmt_bind_param($stmt_id, "ss", $password_input, $email_input);
        mysqli_stmt_execute($stmt_id);
        mysqli_stmt_bind_result($stmt_id, $id_fetch);

        if (mysqli_stmt_fetch($stmt_id) > 0) {
          $_SESSION['id_user'] = $id_fetch;
          $_SESSION['email_user'] = $email_input;
          header("Location: http://localhost/Food_store_website/");
        } else {
        }
      } else {
        echo "<script>alert('Wrong password')</script>";
      }
    } else {
      echo "<script>alert('You must register first')</script>";
    }
  }

  ?>



</body>

</html>