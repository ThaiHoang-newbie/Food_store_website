<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../assets/css/shoppingcart.css">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php
include('connectdb.php');
session_start();
$_SESSION['userid'] = 1;
$userid = $_SESSION['userid'];
$productid = array();
$check = "SELECT budget FROM user where user_id = ?";
$stmt = mysqli_prepare($mysqli, $check);
mysqli_stmt_bind_param($stmt, "i", $userid);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $money);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
?>
?>
<body>
    <div class="container px-3 my-5 clearfix">
        <div class="card">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 60px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                error_reporting(0);
                                $totalprice = 0;
                                foreach ($_SESSION['orders'] as $key => $value) {
                                    $sql = "SELECT * FROM Product where product_id = $key ;";
                                    $result = $mysqli->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                ?>
                                            <td class="p-4">
                                                <div class="media align-items-center">
                                                    <img src="<?php echo $row['image_url'] ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                    <div class="media-body">
                                                        <a href="#" class="d-block text-dark"><?php echo $row['product_name'] ?></a>
                                                        <small>
                                                            <span class="text-muted"><?php echo $row['description'] ?></span>
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php if (empty($row['newprice'])) { ?>
                                                <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row['price'] ?></td>
                                            <?php $price = $value * $row['price'];
                                            } else { ?>
                                                <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row['newprice'] ?></td>
                                            <?php $price = $value * $row['newprice'];
                                            } ?>
                                            <?php $ord = "SELECT * FROM product where product_id =$key;";
                                            $kq = $mysqli->query($ord);
                                            if ($kq->num_rows > 0) {
                                                $rows = $kq->fetch_assoc();
                                            ?>

                                                <td class="align-middle p-4"><input type="text" class="form-control text-center" value="<?php echo $value ?>"></td>
                                                <td class="text-right font-weight-semibold align-middle p-4"><?php echo $price; ?></td>
                                            <?php $totalprice = $totalprice + $price;
                                            } ?>
                                            <td class="text-center align-middle px-0">
                                                <form method="POST" action="deletepd.php">
                                                    <input type="hidden" name="id" value="<?php echo $key; ?>">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">X</button>
                                                </form>
                                            </td>
                            </tr>
                <?php }
                                    }
                                } ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <label class="text-muted font-weight-normal">Promocode</label>
                        <input type="text" placeholder="ABC" class="form-control">
                    </div>
                    <div class="d-flex">

                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large"><strong><?php echo $totalprice; ?></strong></div>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="float-right">
                        <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3" onclick="window.location = '../index.php'">Back to shopping</button>
                        <button type="submit" class="btn btn-lg btn-primary mt-2" name="checkout" id="checkout" onclick="checkout()">Checkout</button>

                        <script>
                            function checkout() {
                                <?php
                                if (isset($_POST['checkout'])) {
                                    foreach ($_SESSION['orders'] as $key => $value) {
                                        $date_array = getdate();
                                        $date .= $date_array['year'] . "-";
                                        $date .= "0" . $date_array['mon'] . "-";
                                        $date .= $date_array['mday'];
                                        $status = "pending";
                                        if ($money['budget'] < $totalprice) {
                                            // Hiển thị thông báo lỗi
                                            echo "<script> swal('Lỗi', 'Bạn không đủ tiền để mua các món hàng này', 'error');</script>";
                                        } else {
                                            $insert = "INSERT INTO Orders(user_id,product_id,order_date,quantity,total_amount,pstatus) VALUES (1,$key,'$date',$value,$totalprice,'$status')";
                                            $ins = $mysqli->query($insert);
                                            if ($ins) {
                                                unset($_SESSION['orders'][$key]);
                                            }
                                        }
                                    }
                                }
                                ?>
                            }
                            const checkoutButton = document.getElementById('checkout');
                            checkoutButton.addEventListener('click', function() {
                                window.location.href = 'bill.php';
                            });
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>