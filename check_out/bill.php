<!DOCTYPE html>
<html>

<head>
    <title>Checkout Bill</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Checkout Bill</h2>
        <div class="row">
            <div class="col-md-6">
                <?php
                session_start();
                $sql = "SELECT * FROM user where user_id = 1;";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <h4>Name: <span id="name"><?php echo $row['username'] ?></span></h4>
                        <p>Phone Number: <span id="name"><?php echo $row['phone_number'] ?></span></p>
                        <p>Address: <span id="address"><?php echo $row['address']; ?></span></p>
            </div>
    <?php }
                } ?>
    <div class="col-md-6">
        <h4>Order Summary:</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="cart">
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
                                }
                            }
                        }
                    } ?>

                </tr>
            </tbody>
        </table>
        <h4>Total: $<span id="total"><?php echo $totalprice; ?></span></h4>
        <button id="done">Back</button>
    </div>
        </div>
    </div>
    <script>
        const checkoutButton = document.getElementById('done');
        checkoutButton.addEventListener('click', function() {
            window.location.href = 'http://localhost:8080/project/Food_store_website/index.php';
        });
    </script>
</body>
</html>