<?php
// Kiểm tra xem có thực hiện việc cập nhật sản phẩm hay không
if(isset($_POST['Edit'])) {
    // Lấy thông tin sản phẩm từ form
   
    $product_name = $_POST['pro_name'];
    $product_description = $_POST['Description'];
    $product_price = $_POST['Price'];
    $product_new_price = $_POST['New_price'];
    $product_image = $_POST['image'];

    // Kết nối tới database
    require_once('connect.php');

    // Kiểm tra kết nối
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Cập nhật thông tin sản phẩm trong database
    $sql = "UPDATE products SET 
            product_name = '$product_name', 
            description = '$product_description', 
            price = '$product_price', 
            newprice = '$product_new_price', 
            image_url = '$product_image' 
            WHERE product_id = $product_id";

    if (mysqli_query($conn, $sql)) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }

    // Đóng kết nối tới database
    mysqli_close($conn);
    header('Location: http://localhost/TamPHP/FinalPHP/Food_store_website/adminseller.php?');

}
?>


