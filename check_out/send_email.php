<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'D:\Xampp\htdocs\Food_store_website\vendor\phpmailer\phpmailer\src\Exception.php';
require 'D:\Xampp\htdocs\Food_store_website\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'D:\Xampp\htdocs\Food_store_website\vendor\phpmailer\phpmailer\src\SMTP.php';

require_once('D:\Xampp\htdocs\Food_store_website\connect.php');

if (!isset($_SESSION["user_id"])) {
    echo "User not logged in";
    exit;
}

$userid = $_SESSION["user_id"];

$select_email = "SELECT `email` FROM `user` WHERE `user_id` = '$userid'";
$result = mysqli_query($conn, $select_email);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "No email found for the user";
    exit;
}

$email_row = mysqli_fetch_assoc($result);
$email_user = $email_row['email'];

$mail = new PHPMailer(true);

try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'thaihoang20112k3@gmail.com';
    $mail->Password = 'nvygpergzqfvnacw';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('thaihoang20112k3@gmail.com');
    $mail->addAddress($email_user);
    $mail->isHTML(true);
    $mail->Subject = "[Food store website] Your order";

    $emailContent = file_get_contents('./bill.php');

    $sql = "SELECT * FROM user WHERE user_id = $userid;";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emailContent = str_replace('{{name}}', $row['username'], $emailContent);
        $emailContent = str_replace('{{phone_number}}', $row['phone_number'], $emailContent);
        $emailContent = str_replace('{{address}}', $row['address'], $emailContent);
    }

    $mail->Body = $emailContent;

    // Send the email
    $mail->send();
    echo 'Order sent successfully';
} catch (Exception $e) {
    echo 'Error sending order: ' . $mail->ErrorInfo;
}
?>
