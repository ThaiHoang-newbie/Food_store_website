<?php
    $pro_id=$_GET['sid'];
    include('connect.php');
    $sql="DELETE FROM product WHERE product_id=$pro_id
    ";
    mysqli_query($conn, $sql);
    header('Location:  http://localhost/TamPHP/FinalPHP/Food_store_website/adminseller.php');
?>
