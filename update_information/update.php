<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "food_store");

if (isset($_POST['update-info'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pasword'];
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];
    $token = $_POST['token'];

    $query = "UPDATE user SET username='$name', email='$email', password='$password',
    phone_number='$phone',address='$address',token='$token' WHERE user_id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: http://localhost/Food_store_website/update_information/updateform.php");
    } else {
        $_SESSION['status'] = "Not Updated";
        header("Location: http://localhost/Food_store_website/update_information/updateform.php");
    }
}
