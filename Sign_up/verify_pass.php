<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <link rel="mask-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111">
    <link rel="canonical" href="https://codepen.io/thaihoang2011/pen/bGxQvgd">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
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
                    $sql = "INSERT INTO `User`(`email`,`user_password`) VALUES ('$verify_email','$password')";
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
                header('Location: http://localhost/FOOD_STORE_WEBSITE/sign_up/login.php');
                exit();
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

    <style id="INLINE_PEN_STYLESHEET_ID">
        * {
            box-sizing: border-box;
        }

        form {
            border-radius: 30px;
            margin: auto;
            max-width: 700px;
            height: auto;
        }

        body {
            margin: 0;
        }

        .title {
            max-width: 400px;
            margin: auto;
            text-align: center;
            font-family: "Poppins", sans-serif;
        }

        .title h3 {
            font-weight: bold;
            color: #ed563b;
        }

        .title p {
            font-size: 12px;
            color: #118a44;
        }

        .title p.msg {
            color: initial;
            text-align: initial;
            font-weight: bold;
        }

        .otp-input-fields {
            margin: auto;
            background-color: white;
            box-shadow: 0px 0px 8px 0px #02025044;
            max-width: 400px;
            width: auto;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 40px;
        }

        .otp-input-fields input {
            height: 40px;
            width: 40px;
            background-color: transparent;
            border-radius: 4px;
            border: 1px solid #ed563b;
            text-align: center;
            outline: none;
            font-size: 16px;
            /* Firefox */
        }

        .otp-input-fields input::-webkit-outer-spin-button,
        .otp-input-fields input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .otp-input-fields input[type=number] {
            -moz-appearance: textfield;
        }

        .otp-input-fields input:focus {
            border-width: 2px;
            border-color: #287a1a;
            font-size: 20px;
        }

        .result {
            max-width: 400px;
            margin: auto;
            padding: 24px;
            text-align: center;
        }

        .result p {
            font-size: 24px;
            font-family: "Antonio", sans-serif;
            opacity: 1;
            transition: color 0.5s ease;
        }

        .result p._ok {
            color: green;
        }

        .result p._notok {
            color: red;
            border-radius: 3px;
        }

        @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");

        /* ---------------Animation---------------- */

        .slit-in-vertical {
            -webkit-animation: slit-in-vertical 0.45s ease-out both;
            animation: slit-in-vertical 0.45s ease-out both;
        }

        @-webkit-keyframes slit-in-vertical {
            0% {
                -webkit-transform: translateZ(-800px) rotateY(90deg);
                transform: translateZ(-800px) rotateY(90deg);
                opacity: 0;
            }

            54% {
                -webkit-transform: translateZ(-160px) rotateY(87deg);
                transform: translateZ(-160px) rotateY(87deg);
                opacity: 1;
            }

            100% {
                -webkit-transform: translateZ(0) rotateY(0);
                transform: translateZ(0) rotateY(0);
            }
        }

        @keyframes slit-in-vertical {
            0% {
                -webkit-transform: translateZ(-800px) rotateY(90deg);
                transform: translateZ(-800px) rotateY(90deg);
                opacity: 0;
            }

            54% {
                -webkit-transform: translateZ(-160px) rotateY(87deg);
                transform: translateZ(-160px) rotateY(87deg);
                opacity: 1;
            }

            100% {
                -webkit-transform: translateZ(0) rotateY(0);
                transform: translateZ(0) rotateY(0);
            }
        }

        /*---------------#region Alert--------------- */

        #dialogoverlay {
            display: none;
            opacity: .8;
            position: fixed;
            top: 0px;
            left: 0px;
            background: #707070;
            width: 100%;
            z-index: 10;
        }

        #dialogbox {
            display: none;
            position: absolute;
            background: rgb(0, 47, 43);
            border-radius: 7px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.575);
            transition: 0.3s;
            width: 40%;
            z-index: 10;
            top: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        #dialogbox:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.911);
        }

        .container {
            padding: 2px 16px;
        }

        .pure-material-button-contained {
            position: relative;
            display: inline-block;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            padding: 0 16px;
            min-width: 64px;
            height: 36px;
            vertical-align: middle;
            text-align: center;
            text-overflow: ellipsis;
            text-transform: uppercase;
            color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
            background-color: rgb(var(--pure-material-primary-rgb, 0, 77, 70));
            /* background-color: rgb(1, 47, 61) */
            box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
            font-family: var(--pure-material-font, "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system);
            font-size: 14px;
            font-weight: 500;
            line-height: 36px;
            overflow: hidden;
            outline: none;
            cursor: pointer;
            transition: box-shadow 0.2s;
        }

        .pure-material-button-contained::-moz-focus-inner {
            border: none;
        }

        /* ---------------Overlay--------------- */

        .pure-material-button-contained::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
            opacity: 0;
            transition: opacity 0.2s;
        }

        /* Ripple */
        .pure-material-button-contained::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            border-radius: 50%;
            padding: 50%;
            width: 32px;
            /* Safari */
            height: 32px;
            /* Safari */
            background-color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
            opacity: 0;
            transform: translate(-50%, -50%) scale(1);
            transition: opacity 1s, transform 0.5s;
        }

        /* Hover, Focus */
        .pure-material-button-contained:hover,
        .pure-material-button-contained:focus {
            box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12);
        }

        .pure-material-button-contained:hover::before {
            opacity: 0.08;
        }

        .pure-material-button-contained:focus::before {
            opacity: 0.24;
        }

        .pure-material-button-contained:hover:focus::before {
            opacity: 0.3;
        }

        /* Active */
        .pure-material-button-contained:active {
            box-shadow: 0 5px 5px -3px rgba(0, 0, 0, 0.2), 0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12);
        }

        .pure-material-button-contained:active::after {
            opacity: 0.32;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0s;
        }

        /* Disabled */
        .pure-material-button-contained:disabled {
            color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
            background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.12);
            box-shadow: none;
            cursor: initial;
        }

        .pure-material-button-contained:disabled::before {
            opacity: 0;
        }

        .pure-material-button-contained:disabled::after {
            opacity: 0;
        }

        #dialogbox>div {
            background: #FFF;
            margin: 8px;
        }

        #dialogbox>div>#dialogboxhead {
            background: rgb(0, 77, 70);
            font-size: 19px;
            padding: 10px;
            color: rgb(255, 255, 255);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        #dialogbox>div>#dialogboxbody {
            background: rgb(0, 47, 43);
            padding: 20px;
            color: #FFF;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        #dialogbox>div>#dialogboxfoot {
            background: rgb(0, 47, 43);
            padding: 10px;
            text-align: right;
        }

        /*#endregion Alert*/
    </style>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>