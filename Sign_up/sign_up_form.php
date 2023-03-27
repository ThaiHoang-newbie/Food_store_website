<?php
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Food store website</title>
    <link rel="stylesheet" href="./assets/css/sign_up_form.css">
    <style>
        input {
            height: auto;
            border: 0.5px gray solid;
            width: auto;
            place-content: center;
        }
    </style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="margin: 0pt auto; padding: 0px; background:#F4F7FA;">

    <form method="POST">
        <video src="https://assets10.lottiefiles.com/packages/lf20_ebqz3ltq.json"></video>
        <table id="main" width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#F4F7FA">
            <tbody>
                <tr>
                    <td valign="top">
                        <table class="innermain" cellpadding="0" width="580" cellspacing="0" border="0" bgcolor="#F4F7FA" align="center" style="margin:0 auto; table-layout: fixed;">
                            <tbody>
                                <!-- START of MAIL Content -->
                                <tr>
                                    <td colspan="4">
                                        <!-- Logo start here -->
                                        <table class="logo" width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" height="10"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="center">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" height="30"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- Logo end here -->
                                        <!-- Main CONTENT -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                                            <tbody>
                                                <tr <td class="content" colspan="2" valign="top" align="center" style="padding-left:90px; padding-right:90px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" valign="bottom" colspan="2" cellpadding="3">
                                                                    <img alt="Food store website" width="80" src="https://www.coinbase.com/assets/app/icon_email-e8c6b940e8f3ec61dcd56b60c27daed1a6f8b169d73d9e79b8999ff54092a111.png" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="30" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"> <span style="color:#48545d;font-size:22px;line-height: 24px;">
                                                                        Verify your email address
                                                                    </span>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="24" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="1" bgcolor="#DAE1E9"></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="24" width="300px" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"> <span style="color:#48545d;font-size:14px;line-height:24px;">
                                                                        In order to start using your <b>Food Store Website</b> account,
                                                                        you need to confirm your email address.
                                                                    </span>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <input type="email" placeholder="Your email" name="verify_email">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td height="20" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="8%" align="center"> <span>
                                                                        <!-- Link here-->
                                                                        <button name="btn" type="submit" onclick="startRedirectCooldown()">Verify mail Address</button>
                                                                        


                                                                            $password = random_password();

                                                                            // Session email and password
                                                                            $_SESSION['email'] = $verify_email;
                                                                            $_SESSION['password'] = $password;

                                                                            setting_mail($verify_email, $password);

                                                                            // error: Cannot modify header information - headers already sent by...
                                                                            // https://helpdesk.inet.vn/knowledgebase/khac-phuc-loi-loi-warning-cannot-modify-header-information-headers-already-sent-by
                                                                        } ?></span>


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height=" 20" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <img src="https://s3.amazonaws.com/app-public/Coinbase-notification/hr.png" width="54" height="2" border="0">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <p style="color:#a2a2a2; font-size:12px; line-height:17px; font-style:italic;">
                                                                        If you did not sign up for this account you can
                                                                        ignore this email and the account
                                                                        will be deleted.</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="60"></td>
                                </tr>
                            </tbody>
                        </table>

                        <script type="text/javascript">
                            let isCooldownActive = false;

                            function startRedirectCooldown() {
                                if (!isCooldownActive) {
                                    isCooldownActive = true;
                                    setTimeout(() => {
                                        isCooldownActive = false;
                                        redirectToVerifyPass();
                                    }, 60000); // Set 60 seconds
                                } else {
                                    console.log("Redirect is on cooldown");
                                }
                            }
                        </script>




                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>