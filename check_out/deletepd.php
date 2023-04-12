<?php 
include('D:\Xampp\htdocs\Food_store_website\check_out\connectdb.php');
session_start();
$idpd = $_POST['id'];
if(isset($idpd)){
    unset($_SESSION['orders'][$idpd]);
    header("Location: ./shoppingcart.php");
} else {
    echo 'Nothing to delete';
}
$mysqli->close();
?>
