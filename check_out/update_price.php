<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kết nối cơ sở dữ liệu - thay đổi thông tin kết nối cho phù hợp
include('connectdb.php');

// Kiểm tra và khởi tạo session 'orders' nếu chưa tồn tại
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = array();
}

// Kiểm tra và khởi tạo session 'total_prices' nếu chưa tồn tại
if (!isset($_SESSION['total_prices'])) {
    $_SESSION['total_prices'] = array();
}

// Xử lý yêu cầu cập nhật số tiền dựa trên ID sản phẩm và số lượng sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Cập nhật số lượng sản phẩm
    $_SESSION['orders'][$productId] = $quantity;

    // Cập nhật tổng số tiền dựa trên số lượng sản phẩm
    $totalPrices = array();
    foreach ($_SESSION['orders'] as $productId => $quantity) {
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu dựa trên $productId
        $sql = "SELECT * FROM Product WHERE product_id = $productId";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (empty($row['newprice'])) {
                $price = $quantity * $row['price']; // Tính giá tiền dựa trên số lượng mới của sản phẩm
            } else {
                $price = $quantity * $row['newprice']; // Tính giá tiền dựa trên số lượng mới của sản phẩm
            }
            $totalPrices[$productId] = $price;
        }
    }

    // Lưu trữ tổng giá trị cho từng sản phẩm trong session
    $_SESSION['total_prices'] = $totalPrices;

    // Trả về tổng số tiền mới cho sản phẩm có ID tương ứng
    echo $totalPrices[$productId];
}

// Đóng kết nối cơ sở dữ liệu
$mysqli->close();
?>
