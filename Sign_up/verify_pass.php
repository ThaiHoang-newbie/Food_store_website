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
    <?php
    require("../connect_db.php");
    ?>


    <form action="javascript: void(0)" class="otp-form" name="otp-form">
        <div class="title">
            <h3>OTP VERIFICATION</h3>

            <p class="info">An otp has been sent to

                <?php
                // Start the session
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
            <?php // Sending email
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require '../vendor/autoload.php';

            if (isset($_SESSION['email'])) {

                // Setting mail
                function setting_mail($verify_email, $password)
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

                $verify_email = $_SESSION['email'];
                $password = random_int(100000, 999999);
                setting_mail($verify_email, $password);
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


    </form>


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
    </style>
    <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeConsoleRunner-6bce046e7128ddf9391ccf7acbecbf7ce0cbd7b6defbeb2e217a867f51485d25.js"></script>
    <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRefreshCSS-44fe83e49b63affec96918c9af88c0d80b209a862cf87ac46bc933074b8c557d.js"></script>
    <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRuntimeErrors-4f205f2c14e769b448bcf477de2938c681660d5038bc464e3700256713ebe261.js"></script>
    <script src="../assets/js/verify_pass.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>