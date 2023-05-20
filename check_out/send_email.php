<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

require_once('D:\Xampp\htdocs\Food_store_website\contact.php');
$userid = $_SESSION["user_id"];

$select_email = "SELECT `email` FROM `user` WHERE `user_id` = '$userid'";

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
$mail->Subject = "[Food store website]_Your order";


// Đọc nội dung email từ tệp tin HTML
$emailContent = file_get_contents('./bill.php');

$sql = "SELECT * FROM users where user_id = $userid;";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emailContent = str_replace('{{name}}', $row['username'], $emailContent);
        $emailContent = str_replace('{{phone_number}}', $row['phone_number'], $emailContent);
        $emailContent = str_replace('{{address}}', $row['address'], $emailContent);
    }
}

$mail->Body = $emailContent;


if (!$mail->send()) {
    echo 'Sent order fail: ' . $mail->ErrorInfo;
} else {
    echo 'Sent order successful';
}
?>

<script>
    const checkoutButton = document.getElementById('done');
    checkoutButton.addEventListener('click', function() {
        fetch('send_email.php', {
                method: 'POST',
            })
            .then(function(response) {
                if (response.ok) {
                    console.log('Email đã được gửi thành công');
                } else {
                    console.log('Có lỗi khi gửi email');
                }
            })
            .catch(function(error) {
                console.log('Có lỗi khi gửi email:', error);
            });
    });
</script>