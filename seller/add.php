<?php
if (isset($_POST['Add'])) {

    $Product_Name=$_POST['pro_name'];
    $Description=$_POST['Description'];
    $Price=$_POST['Price'];
    $New_price=$_POST['New_price'];
    $image=$_POST['image'];

    include('../connect.php');


    $sql="INSERT INTO product (product_name,description,price,newprice,image_url)
    VALUES (' $Product_Name', ' $Description','$Price','$New_price',' $image')";
    mysqli_query($conn, $sql);
    header('Location: http://localhost/Food_store_website/seller/Adminseller.php');
}
