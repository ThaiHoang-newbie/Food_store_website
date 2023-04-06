<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <!-- -- SweetAlert  -->
  <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php 
include('connectdb.php');
session_start();
$idpd = $_POST['id'];
// $sql = "DELETE FROM Orders WHERE order_id=$idpd;";
// if ($mysqli->query($sql) === true) {
//     echo '<script>window.location.href = "shoppingcart.php";</script>';
//     // header('Location: shoppingcart.php');
//     // echo "<script> swal('Thành công', 'Bạn đã thực hiện hành động thành công', 'success'); </script>";
// } else {
//     echo " ERROR: Could not able to execute $sql." . $mysqli->error;
// }
if(isset($idpd)){
    unset($_SESSION['orders'][$idpd]);
    echo '<script>window.location.href = "shoppingcart.php";</script>';
    //     // header('Location: shoppingcart.php');
    //     // echo "<script> swal('Thành công', 'Bạn đã thực hiện hành động thành công', 'success'); </script>";
} else {
    echo 'Không có phần tử để xóa';
}

$mysqli->close();
?>
</body>

</html>