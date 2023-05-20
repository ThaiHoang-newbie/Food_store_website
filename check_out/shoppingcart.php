<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../assets/css/shoppingcart.css">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    .quantity-container {
        display: flex;
        align-items: center;
    }

    .quantity-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background-color: #ccc;
        border: none;
        cursor: pointer;
        margin: 0 5px;
        font-size: 16px;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
    }
</style>
<?php
session_start();
$_SESSION['bills'] = array();
$userid =  $_SESSION["user_id"];
$productid = array();
include('connectdb.php');
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


                                                <td class="align-middle p-4">
                                                    <div class="quantity-container">
                                                        <button class="quantity-button minus-button" type="button">-</button>
                                                        <input type="text" class="form-control text-center quantity-input" name="quantity[<?php echo $key; ?>]" value="<?php echo $value; ?>">
                                                        <button class="quantity-button plus-button" type="button">+</button>
                                                    </div>
                                                </td>
                                                <td class="text-right font-weight-semibold align-middle p-4 " id="total-price-<?php echo $row['product_id'] ?>"><?php echo $price; ?></td>
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
                        <button type="submit" class="btn btn-lg btn-primary mt-2" name="checkout" id="checkout">Checkout</button>
                    </div>
                </form>
                <?php 
                $date_array = getdate();
                $date .= $date_array['year'] . "-";
                $date .= "0" . $date_array['mon'] . "-";
                $date .= $date_array['mday'];
                $status = "pending";
                $check = "SELECT budget FROM user where user_id = $userid";

                $query = $mysqli->query($check);
                $row = $query->fetch_assoc();
                if (isset($_POST['checkout'])) {
                    foreach ($_SESSION['orders'] as $key => $value) {
                        $pro = "SELECT * FROM Product where product_id = $key ;";
                        $result = $mysqli->query($pro);
                        $rel = $result->fetch_assoc();
                        if (empty($rel['newprice'])) {
                            $price = $value * $rel['price'];
                        } else {
                            $price = $value * $rel['newprice'];
                        }

                        if (floatval($row['budget']) >= $totalprice) {
                            $muser = $row['budget'] - $price;
                            $sql = "INSERT INTO Orders(user_id,product_id,order_date,quantity,total_amount,pstatus) VALUES ($userid,$key,'$date',$value,$price,'$status')";
                            $add = $mysqli->query($sql);
                            $minusmoney = "UPDATE user SET `budget`=$muser WHERE user_id = $userid";
                            $minusm = $mysqli->query($minusmoney);
                            if ($add) {
                                $_SESSION['bills'] += $_SESSION['orders'];
                                unset($_SESSION['orders'][$key]);
                            }
                            $i = $i + 1;
                        } else {
                            echo "<script>swal('Error', 'You don\'t have enough money to buy these items', 'error');</script>";
                            break;
                        }
                    }
                    if ($i > 0) {
                        echo "<script>window.location.href ='http://localhost/Food_store_website/check_out/bill.php';</script>";
                        exit;
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Lắng nghe sự kiện nhấn các nút tăng và giảm số lượng
        $(document).on('click', '.quantity-button', function(event) {
            var inputElement = $(this).closest('.quantity-container').find('.quantity-input');
            var currentValue = parseInt(inputElement.val());
            var productId = inputElement.attr('name').match(/\[(\d+)\]/)[1];

            // Xử lý tăng hoặc giảm số lượng sản phẩm
            if ($(this).hasClass('plus-button')) {
                currentValue++;
            } else if ($(this).hasClass('minus-button')) {
                if (currentValue > 1) {
                    currentValue--;
                }
            }

            // Cập nhật giá trị số lượng sản phẩm trong input
            inputElement.val(currentValue);

            // Gửi yêu cầu AJAX để cập nhật số tiền
            $.ajax({
                url: 'update_price.php',
                type: 'POST',
                data: {
                    productId: productId,
                    quantity: currentValue
                },
                success: function(response) {
                    // Cập nhật tổng số tiền hiển thị trên giao diện
                    var totalPrice = parseFloat(response);
                    $('#total-price-' + productId).text(totalPrice);
                    console.log(productId);
                }
            });
        });
    </script>


</body>

</html>