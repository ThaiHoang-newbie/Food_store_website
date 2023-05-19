<?php 
include('connectdb.php');
session_start();
$idpd = $_POST['id'];
if(isset($idpd)){
    unset($_SESSION['orders'][$idpd]);
    header("Location:http://localhost/project/Food_store_website/check_out/shoppingcart.php");
} else {
    echo 'Nothing to delete';
}
$mysqli->close();
?>
