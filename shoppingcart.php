<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- -- SweetAlert  -->
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Shopping Cart</title>
    <style>
        body {
            margin-top: 20px;
            background: #eee;
        }

        .ui-w-40 {
            width: 40px !important;
            height: auto;
        }

        .card {
            box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
        }

        .ui-product-color {
            display: inline-block;
            overflow: hidden;
            margin: .144em;
            width: .875rem;
            height: .875rem;
            border-radius: 10rem;
            -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            vertical-align: middle;
        }
    </style>

    <!-- -- SweetAlert  -->
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php
include('connectdb.php');
session_start();
$_SESSION['userid'] = 1;
$userid = $_SESSION['userid'];
$productid = array();
$sql = "SELECT * FROM Orders where user_id = $userid and pstatus = 'pending'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['user_id'] == $userid) {
            array_push($productid, $row['product_id']);
        }
    }
}
?>

<body>
    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <!-- Set columns width -->
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
                                $totalprice = 0;
                                foreach ($productid as $key) {
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
                                            <?php } else { ?>
                                                <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row['newprice'] ?></td>
                                            <?php } ?>
                                            <?php $ord = "SELECT * FROM orders where product_id =$key;";
                                            $kq = $mysqli->query($ord);
                                            if ($kq->num_rows > 0) {
                                                $rows = $kq->fetch_assoc();
                                            ?>

                                                <td class="align-middle p-4"><input type="text" class="form-control text-center" value="<?php echo $rows['quantity'] ?>"></td>
                                                <td class="text-right font-weight-semibold align-middle p-4"><?php echo $rows['total_amount'] ?></td>
                                            <?php $totalprice = $totalprice + $rows['total_amount'];
                                            } ?>


                                            <td class="text-center align-middle px-0">
                                                <form method="POST" action="deletepd.php">
                                                    <input type="hidden" name="id" value="<?php echo $rows['order_id']; ?>">
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
                <!-- / Shopping cart table -->

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

                <div class="float-right">
                    <a href="index.php"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button></a>

                   <button type="button" class="btn btn-lg btn-primary mt-2" onclick="checkout()">Checkout</button>
                    <script>
                        function checkout() {
                            // Hiển thị thông báo thành công
                            swal("Thành công", "Bạn đã thực hiện hành động thành công", "success");
                        }
                    </script>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>