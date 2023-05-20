<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connectdb.php');

if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = array();
}

if (!isset($_SESSION['total_prices'])) {
    $_SESSION['total_prices'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    $_SESSION['orders'][$productId] = $quantity;

    $totalPrices = array();
    foreach ($_SESSION['orders'] as $productId => $quantity) {
        $sql = "SELECT * FROM Product WHERE product_id = $productId";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (empty($row['newprice'])) {
                $price = $quantity * $row['price']; 
            } else {
                $price = $quantity * $row['newprice']; 
            }
            $totalPrices[$productId] = $price;
        }
    }

    $_SESSION['total_prices'] = $totalPrices;

    echo $totalPrices[$productId];
}

$mysqli->close();
?>
