<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="ordersBtn">
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>O.N.</th>
        <th>Customer</th>
        <th>Product Name</th>
        <th>OrderDate</th>
        <th>Total Amount</th>
        <th>Quantity</th>
        <th>Order Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php
    error_reporting(0);
    include_once "../config/dbconnect.php";
    $sql = "SELECT * from orders where pstatus = 'pending'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $row["order_id"] ?></td>
          <?php
          $user = $row["user_id"];
          $sel = "SELECT username from users where user_id= $user";
          $rel = $conn->query($sel);
          $dt = $rel->fetch_assoc();

          ?>
          <td><?= $dt["username"] ?></td>
          <?php
          $name = $row["product_id"];
          $sqli = "SELECT product_name from product where product_id= $name";
          $kq = $conn->query($sqli);
          $data = $kq->fetch_assoc();

          ?>
          <td><?= $data["product_name"] ?></td>
          <td><?= $row["order_date"] ?></td>
          <td><?= $row["quantity"] ?></td>
          <td><?= $row["total_amount"] ?></td>
          <td><?= $row["pstatus"] ?></td>
          <?php
          if ($row["pstatus"] == "pending") {

          ?>
            <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">✔</button> </td>
            <td>
              <button class="btn btn-danger" onclick="DeleteOrder('<?= $row['order_id'] ?>')">✖</button>
            </td>
          <?php

          } ?>
        </tr>
    <?php

      }
    }
    ?>

  </table>


</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="order-view-modal modal-body">

      </div>
    </div><!--/ Modal content-->
  </div><!-- /Modal dialog-->
</div>
<script>
  //for view order modal  
  $(document).ready(function() {
    $('.openPopup').on('click', function() {
      var dataURL = $(this).attr('data-href');

      $('.order-view-modal').load(dataURL, function() {
        $('#viewModal').modal({
          show: true
        });
      });
    });
  });

  // Hàm xóa đơn hàng
  function DeleteOrder(id) {
    $.ajax({
      url: "./controller/deleteOrderController.php",
      method: "post",
      data: { record: id },
      success: function(data) {
        alert('Order Successfully deleted');
        $('form').trigger('reset');
        showOrders();
      }
    });
    console.log(id);
  }

</script>
