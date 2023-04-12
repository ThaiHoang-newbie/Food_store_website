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
            <input type="checkbox" id="rememberMeCheckbox" checked>
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


    <div class="login-card-social">
      <div>Other Sign-In Options</div>
      <div class="login-card-social-btns">
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
          </svg>

        </a>
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
          </svg>

        </a>
      </div>
    </div>
  </div>

  <?php
  // Login

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
        $_SESSION['email_user'] = $email_input;
        $_SESSION['password_user'] = $password_input;
        header("Location: http://localhost/Food_store_website/");
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