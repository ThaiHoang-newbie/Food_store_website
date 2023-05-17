<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Manage Product</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../assets/css/admin_seller.css">
</head>

<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">

						<div class="col-sm-6">
							<h2>Manage <b>Product</b> </h2>
						</div>
						<div class="col-sm-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Products Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Image</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php
						require('../connect.php');
						$sql = "SELECT * FROM `product`, `user` WHERE product.user_id = user.user_id";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
						?>
							<tr id="<?php echo $row['product_id']; ?>">
								<td data-target="product_name"><?php echo $row['product_name'] ?></td>
								<td data-target="description"><?php echo $row['description'] ?></td>
								<td data-target="price"><?php echo $row['price'] ?></td>
								<td data-target="newprice"><?php echo $row['newprice'] ?></td>
								<td data-target="image_url"><img src="<?php echo $row['image_url'] ?>" alt="" style=" height: 120px;  width: 150px;"></td>
								<td>
									<a class="edit" data-role="update" data-id="<?php echo $row['product_id'] ?> " data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<a href="delete.php?sid=<?php echo $row['product_id'] ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
								</td>

					</tbody>
				<?php } ?>

				</table>
			</div>
		</div>
	</div>

	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method='post' action='add.php'>
					<div class="modal-header">
						<h4 class="modal-title">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Product_Name</label>
							<input type="text" name="pro_name" class="form-control" required>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="Description" required></textarea>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input name="Price" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>New_price</label>
							<input Name="New_price" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>image</label>
							<input type="text" name="image" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="Add" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Edit Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="pro_id" value="" />
						<div class="form-group">
							<label>Product_Name</label>
							<input type="text" name="pro_name" id="pro_name" class="form-control" value="" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" id="Description" required></textarea>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input id="Price" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>New_price</label>
							<input id="New_price" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>image</label>
							<input type="text" id="image" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" id="Edit" class="btn btn-success" value="Edit">
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
<script>
	$(document).ready(function() {
		$(document).on('click', 'a[data-role=update]', function() {
			var id = $(this).data('id');
			var product_name = $('#' + id).children('td[data-target=product_name]').text();
			var description = $('#' + id).children('td[data-target=description]').text();
			var price = $('#' + id).children('td[data-target=price]').text();
			var new_price = $('#' + id).children('td[data-target=Newprice]').text();
			var image_url = $('#' + id).children('td[data-target=image_url]').find('img').attr('src');

			$('#pro_name').val(product_name);
			$('#Description').val(description);
			$('#Price').val(price);
			$('#New_price').val(new_price);
			$('#image').val(image_url);
			$('#pro_id').val(id);
			$('#editEmployeeModal').modal('toggle');

		});


		$('#Edit').click(function() {
			var id = $('#pro_id').val();
			var product_name = $('#pro_name').val();
			var decscripton = $('#Description').val();
			var price = $('#Price').val();
			var New_price = $('#New_price').val();
			var image = $('#image').val();

			$.ajax({
				url: 'Edit.php',
				method: 'post',
				data: {
					id: id,
					product_name: product_name,
					decscripton: decscripton,
					price: price,
					New_price: New_price,
					image: image
				}
			});
		})
	});
</script>

</html>