<!DOCTYPE html>
<html>

<head>
    <title>Checkout Bill</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="my-4 text-center">Checkout Bill</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                session_start();
                include('connectdb.php');
                $userid =  $_SESSION["user_id"];

                $sql = "SELECT * FROM user where user_id = $userid;";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <h4>Name: <span id="name"><?php echo $row['username'] ?></span></h4>
                        <p>Phone Number: <span id="name"><?php echo $row['phone_number'] ?></span></p>
                        <p>Address: <span id="address"><?php echo $row['address']; ?></span></p>
                <?php }
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Order Summary:</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="cart">
                        <?php
                        error_reporting(0);
                        $totalprice = 0;
                        foreach ($_SESSION['bills'] as $key => $value) {
                            $sqli = "SELECT * FROM product where product_id = $key ;";
                            $kq = $mysqli->query($sqli);
                            if ($kq->num_rows > 0) {
                                while ($row = $kq->fetch_assoc()) {
                        ?>
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <img src="<?php echo $row['image_url'] ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="" style="width:150px">
                                                <div class="media-body">
                                                    <a href="#" class="d-block text-dark"><?php echo $row['product_name'] ?></a>
                                                    <small class="text-muted"><?php echo $row['description'] ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <?php if (empty($row['newprice'])) { ?>
                                            <td class="text-right font-weight-semibold"><?php echo $row['price'] ?></td>
                                        <?php $price = $value * $row['price'];
                                        } else { ?>
                                            <td class="text-right font-weight-semibold"><?php echo $row['newprice'] ?></td>
                                        <?php $price = $value * $row['newprice'];
                                        } ?>
                                        <td><?php echo $value ?></td>
                                        <td class="text-right font-weight-semibold"><?php echo $price; ?></td>
                                    </tr>
                        <?php $totalprice = $totalprice + $price;
                                }
                            }
                        } ?>
                    </tbody>
                </table>
                <h4 class="text-right">Total: $<span id="total"><?php echo $totalprice; ?></span></h4>
                <button id="done" class="btn btn-primary">Back</button>
            </div>
        </div>
    </div>
    <script>
        const checkoutButton = document.getElementById('done');
        checkoutButton.addEventListener('click', function() {
            window.location.href = 'http://localhost/Food_store_website/index.php';
        });
    </script>
</body>

</html>