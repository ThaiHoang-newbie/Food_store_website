<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php
    include('connectdb.php');
    session_start();
    $idpd = $_POST['id'];

    if (isset($idpd)) {
        unset($_SESSION['orders'][$idpd]);
        echo '<script>window.location.href = "shoppingcart.php";</script>';
    } else {
        echo 'Không có phần tử để xóa';
    }

    $mysqli->close();
    ?>
</body>

</html>