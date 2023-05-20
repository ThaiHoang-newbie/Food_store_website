<?php
// Kết nối database
include_once '../connect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {  
   
    $product_id = $_POST['id'];
    $pro_name = $_POST['product_name'];
    $Description = $_POST['decscripton'];
    $Price = $_POST['price'];
    $New_price = $_POST['New_price'];
    $image = $_POST['image'];
    // Cập nhật thông tin sản phẩm vào CSDL
    $sql = "UPDATE product SET product_name='$pro_name', description='$Description', price='$Price', Newprice='$New_price', image_url='$image' WHERE product_id=$product_id";
    mysqli_query($conn, $sql);
        // Nếu cập nhật thành công, chuyển hướng về trang danh sách sản phẩm
    header('Location:  http://localhost/Food_store_website/seller/Adminseller.php');

}
?>