<?php

// Bắt đầu phiên làm việc (session)
session_start();

// Lấy địa chỉ email từ session
$email = $_SESSION['email_user'];
include('../connect.php');
$query = "SELECT user_id FROM user WHERE email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $query);

// Kiểm tra kết quả
if (mysqli_num_rows($result) > 0) {
    // Lấy user_id từ kết quả truy vấn
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

 
    if (isset($_POST['Add'])) {
        $Product_Name=$_POST['pro_name'];
        $Description=$_POST['Description'];
        $Price=$_POST['Price'];
        $New_price=$_POST['New_price'];
        $image=$_POST['image'];
        $user_id=$user_id;
        include('../connect.php');
        $sql="INSERT INTO product (product_name,description,price,newprice,image_url,user_id)
        VALUES (' $Product_Name', ' $Description','$Price','$New_price',' $image',' $user_id')";
        mysqli_query($conn, $sql);
        
        header('Location: http://localhost/Food_store_website/seller/Adminseller.php');
        // Thực thi câu truy vấn thêm sản phẩm
    

    // ...
} else {
    // Xử lý khi không tìm thấy user_id
}
}
