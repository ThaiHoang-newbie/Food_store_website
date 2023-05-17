<!doctype html>
<html lang="en">

<head>
    <title>Verify password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <link rel="mask-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111">
    <link rel="canonical" href="https://codepen.io/thaihoang2011/pen/bGxQvgd">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/verify_pass.css">
</head>


<body>
    <form action="javascript: void(0)" class="otp-form" name="otp-form">
        <div class="title">
            <h3>OTP VERIFICATION</h3>
            <p class="info">An otp has been sent to

                <?php
                // Hidden email
                session_start();

                if (isset($_SESSION['email'])) {
                    function hidden_email($email)
                    {
                        $hidden_email = '';
                        for ($i = 0; $i < (strlen($email) - 13); $i++) {
                            $hidden_email .= "*";
                        }
                        $hidden_email .= substr($email, -13);
                        return $hidden_email;
                    }
                    $verify_email = $_SESSION['email'];
                    echo hidden_email($verify_email);
                }
                ?>

            </p>
            <?php // Sendding email
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            include("./connect_db.php");
            require '../vendor/autoload.php';

            if (isset($_SESSION['email'])) {

                $verify_email = $_SESSION['email'];

                // Setting mail
                function sendding_mail($verify_email, $password)
                {
                    $mail = new PHPMailer(true);

                    // Configure an SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'thaihoang20112k3@gmail.com';
                    $mail->Password = 'nvygpergzqfvnacw';
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPDebug = 0;
                    $mail->Port = 465;

                    $mail->setFrom('thaihoang20112k3@gmail.com');
                    $mail->addAddress($verify_email);
                    $mail->isHTML(true);
                    $mail->Subject = "[Food store website]_Your password";
                    $mail->Body = "Here is your password: " . $password;
                    $mail->send();
                };

                // Check exist email
                $select_email = "SELECT `email` FROM `user` WHERE `email` = '$verify_email'";
                $check_email = mysqli_query($conn, $select_email);

                if (mysqli_num_rows($check_email) != 0) {
                } else {
                    $password = random_int(100000, 999999);
                    // Call sendding_mail function
                    sendding_mail($verify_email, $password);

                    // Insert email and pass in the database
                    $sql = "INSERT INTO `User`(`email`,`user_password`, `user_type`, `budget`) VALUES ('$verify_email','$password', 'customer', 100)";
                    $result = mysqli_query($conn, $sql);
                }
            };
            ?>

            <p class="msg">Please enter OTP to verify</p>
        </div>
        <div class="otp-input-fields">
            <input type="number" class="otp__digit otp__field__1">
            <input type="number" class="otp__digit otp__field__2">
            <input type="number" class="otp__digit otp__field__3">
            <input type="number" class="otp__digit otp__field__4">
            <input type="number" class="otp__digit otp__field__5">
            <input type="number" class="otp__digit otp__field__6">
        </div>



        <div class="result">
            <p id="_otp" class="_notok">Your password</p>
        </div>


        <?php

        function get_valueFromStringUrl($url, $parameter_name)
        {
            $parts = parse_url($url);
            if (isset($parts['query'])) {
                parse_str($parts['query'], $query);
                if (isset($query[$parameter_name])) {
                    return $query[$parameter_name];
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }

        // Get current url
        $protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        // Get variableName user entered
        $variableName = get_valueFromStringUrl($CurPageURL, "variableName");

        $select_user_pass = "SELECT `user_password` FROM `user` WHERE `email` = '$verify_email'";
        $conn_user_pass = mysqli_query($conn, $select_user_pass);

        if ($row = mysqli_fetch_assoc($conn_user_pass)) {
            if ($variableName == $row['user_password']) {
                echo "<script>alert('Verify email successfull')</script>";
                echo "<script>
                    setTimeout(function(){
                        window.location.href = 'http://localhost/FOOD_STORE_WEBSITE/sign_up/login.php';
                    }, 1000);
                </script>";
            } else if ($variableName == null) {
            } else {
                echo "<script>alert('Password incorrect')</script>";
            }
        } else {
            echo "<script>alert('User not found')</script>";
        }
        ?>

    </form>



    <script src="../assets/js/verify_pass.js">
    </script>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>