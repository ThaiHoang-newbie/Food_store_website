<?php
// Kết nối database
include_once 'connect.php';

if(isset($_POST['Edit'])) {  
    echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';  
    echo $product_id = $_POST['id'];
    $pro_name = $_POST['product_name'];
    $Description = $_POST['description'];
    $Price = $_POST['price'];
    $New_price = $_POST['New_price'];
    $image = $_POST['image'];

    

    // Cập nhật thông tin sản phẩm vào CSDL
    $sql = "UPDATE product SET product_name='$pro_name', description='$Description', price='$Price', Newprice='$New_price', image_url='$image' WHERE product_id=$product_id";
    if(mysqli_query($conn, $sql)) {
        // Nếu cập nhật thành công, chuyển hướng về trang danh sách sản phẩm

    } else {
        // Nếu cập nhật thất bại, thông báo lỗi
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>