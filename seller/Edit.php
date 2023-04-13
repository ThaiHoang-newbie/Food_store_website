<?php
// Kết nối database
include_once 'connect.php';

if(isset($_POST['Edit'])) {    
    $product_id = $_POST['product_id'];
    $pro_name = $_POST['pro_name'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $New_price = $_POST['New_price'];
    $image = $_POST['image'];

    // Cập nhật thông tin sản phẩm vào CSDL
    $sql = "UPDATE product SET product_name='$pro_name', description='$Description', price='$Price', Newprice='$New_price', image_url='$image' WHERE product_id=$product_id";
    if(mysqli_query($conn, $sql)) {
        // Nếu cập nhật thành công, chuyển hướng về trang danh sách sản phẩm
        header('location: http://localhost/TamPHP/FinalPHP/Food_store_website/adminseller.php?');
    } else {
        // Nếu cập nhật thất bại, thông báo lỗi
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>