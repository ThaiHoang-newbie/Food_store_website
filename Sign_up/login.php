<!DOCTYPE html>
<html lang='en' class=''>

<head>

  <meta charset='UTF-8'>
  <title>CodePen Demo</title>

  <meta name="robots" content="noindex">

  <link rel="mask-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111">
  <link rel="canonical" href="https://codepen.io/DivineBlow/pen/bGwYYPQ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">



  <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeConsoleRunner-6bce046e7128ddf9391ccf7acbecbf7ce0cbd7b6defbeb2e217a867f51485d25.js"></script>
  <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRefreshCSS-44fe83e49b63affec96918c9af88c0d80b209a862cf87ac46bc933074b8c557d.js"></script>
  <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRuntimeErrors-4f205f2c14e769b448bcf477de2938c681660d5038bc464e3700256713ebe261.js"></script>
</head>

<body>
  <section>

    <div class="box">

      <div class="square" style="--i:0;"></div>
      <div class="square" style="--i:1;">
        <!-- <img src="../assets/images/Food.jpg" alt="Food" width="200px"> -->
      </div>
      <div class="square" style="--i:2;"></div>
      <div class="square" style="--i:3;"></div>
      <div class="square" style="--i:4;"></div>
      <div class="square" style="--i:5;"></div>

      <div class="container">

        <div class="form">

          <h2>LOGIN</h2>

          <form action="" method="POST">


            <div class="inputBx">
              <input type="email" name="email" required="required">
              <span>Email</span>
              <i class="fas fa-user-circle"></i>
            </div>


            <div class="inputBx password">
              <input id="password-input" type="password" name="password" required="required">
              <span>Password</span>
              <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
              <i class="fas fa-key"></i>
            </div>


            <div class="inputBx">
              <input type="submit" value="Log in" name="btn-login">
            </div>


          </form>


          <?php
          // Login
          if (isset($_POST['btn-login'])) {
            include('../Sign_up/connect_db.php');
            $email_input = $_POST['email'];
            $password_input = $_POST['password'];


            $select_log_user_email = "SELECT `email` FROM `user` WHERE `email` = '$email_input'";
            $conn_log_user_email = mysqli_query($conn, $select_log_user_email);
            $e_fetch = mysqli_fetch_assoc($conn_log_user_email);

            $select_log_user_pass = "SELECT `user_password` FROM `user` WHERE `user_password` = '$password_input'";
            $conn_log_user_pass = mysqli_query($conn, $select_log_user_pass);
            $p_fetch = mysqli_fetch_assoc($conn_log_user_pass);

            if ($e_fetch != 0) {
              if ($p_fetch != 0) {
                header("Location: http://localhost/Food_store_website/");
              } else {
                echo "<script>alert('Wrong password')</script>";
              }
            } else {
              echo "<script>alert('User not exist')</script>";
            };
          }
          ?>

          <p>Forgot password? <a href="#">Click Here</a></p>

          <?php //Forgot password
          require_once('./forgot_pass.php');

          ?>

          <p>Don't have an account <a href="./sign_up.php">Sign up</a></p>
        </div>
      </div>

    </div>
  </section>


  <style id="INLINE_PEN_STYLESHEET_ID">
    @import url("https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&display=swap");

    * {
      margin: 0;
      padding: 0;
      font-family: "El Messiri", sans-serif;
    }

    body {
      background-image: url('../assets/images/video.mp4');
      overflow: hidden;
    }

    .fas {
      width: 32px;
    }

    section {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(-45deg, #10d90c, #71e377, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 10s ease infinite;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .box {
      position: relative;
    }

    .box .square {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
      box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 15px;
      animation: square 10s linear infinite;
      animation-delay: calc(-1s * var(--i));
    }

    @keyframes square {

      0%,
      100% {
        transform: translateY(-20px);
      }

      50% {
        transform: translateY(20px);
      }
    }

    .box .square:nth-child(1) {
      width: 100px;
      height: 100px;
      top: -15px;
      right: -45px;
    }

    .box .square:nth-child(2) {
      width: 150px;
      height: 150px;
      top: 105px;
      left: -125px;
      z-index: 2;
    }

    .box .square:nth-child(3) {
      width: 60px;
      height: 60px;
      bottom: 85px;
      right: -45px;
      z-index: 2;
    }

    .box .square:nth-child(4) {
      width: 50px;
      height: 50px;
      bottom: 35px;
      left: -95px;
    }

    .box .square:nth-child(5) {
      width: 50px;
      height: 50px;
      top: -15px;
      left: -25px;
    }

    .box .square:nth-child(6) {
      width: 85px;
      height: 85px;
      top: 165px;
      right: -155px;
      z-index: 2;
    }

    .container {
      position: relative;
      padding: 50px;
      width: 260px;
      min-height: 380px;
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
      border-radius: 10px;
      box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
    }

    .container::after {
      content: "";
      position: absolute;
      top: 5px;
      right: 5px;
      bottom: 5px;
      left: 5px;
      border-radius: 5px;
      pointer-events: none;
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 2%);
    }

    .form {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .form h2 {
      color: #fff;
      letter-spacing: 2px;
      margin-bottom: 30px;
      text-align: center;
    }

    .form .inputBx {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .form .inputBx input {
      width: 80%;
      outline: none;
      border: none;
      border: 1px solid rgba(255, 255, 255, 0.2);
      background: rgba(255, 255, 255, 0.2);
      padding: 8px 10px;
      padding-left: 40px;
      border-radius: 15px;
      color: #fff;
      font-size: 16px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .form .inputBx .password-control {
      position: absolute;
      top: 11px;
      right: 10px;
      display: inline-block;
      width: 20px;
      height: 20px;
      background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
      transition: 0.5s;
    }

    .form .inputBx .view {
      background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
      transition: 0.5s;
    }

    .form .inputBx .fas {
      position: absolute;
      top: 13px;
      left: 13px;
    }

    .form .inputBx input[type=submit] {
      background: #fff;
      color: #111;
      max-width: 100px;
      padding: 8px 10px;
      box-shadow: none;
      letter-spacing: 1px;
      cursor: pointer;
      transition: 1.5s;
    }

    .form .inputBx input[type=submit]:hover {
      background: linear-gradient(115deg, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0.25));
      color: #fff;
      transition: 0.5s;
    }

    .form .inputBx input::placeholder {
      color: #fff;
    }

    .form .inputBx span {
      position: absolute;
      left: 30px;
      padding: 10px;
      display: inline-block;
      color: #fff;
      transition: 0.5s;
      pointer-events: none;
    }

    .form .inputBx input:focus~span,
    .form .inputBx input:valid~span {
      transform: translateX(-30px) translateY(-25px);
      font-size: 12px;
    }

    .form p {
      color: #fff;
      font-size: 15px;
      margin-top: 5px;
    }

    .form p a {
      color: #fff;
    }

    .form p a:hover {
      background-color: #000;
      background-image: linear-gradient(to right, #434343 0%, black 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>

  <script>
    function show_hide_password(target) {
      var input = document.getElementById('password-input');
      if (input.getAttribute('type') == 'password') {
        target.classList.add('view');
        input.setAttribute('type', 'text');
      } else {
        target.classList.remove('view');
        input.setAttribute('type', 'password');
      }
      return false;
    }
  </script>
  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
  <script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-ea3887b7-dea1-671a-f333-0b593c808586" crossorigin></script>
</body>

</html>