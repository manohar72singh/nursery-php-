<?php include 'connection.php' ?>
<?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cart</title>
</head>
<body>
<div class="card mt-3">
	<div class="card-header">
		<center><h2 class="fas fa-shopping-cart">Cart(s)</h2></center>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Image</th>
							<th>Product Name</th>
							<th width="300">Quantity</th>
							<th width="300">Price</th>
							<th>Total</th>
							<th>OPtion</th>
						</tr>
					</thead>
					<tbody> 
					<?php
						$ta=0;
						$query="SELECT cart.id as cid, cart.price as price,cart.qty as qty, user.id as uid, plant.name as pname FROM cart JOIN user ON user.id=cart.user_id JOIN plant ON cart.plant_id=plant.id WHERE user.id=".$_SESSION['id'];

						$result=mysqli_query($con,$query);
						while ($data=mysqli_fetch_row($result)) 
						{ 
							?>
							<tr>
								<td><img src="images/images.jpeg" style="width: 100px"></td>
								<td><?php echo $data[4]?></td>
								<td><?php echo $data[2]?></td>
								<td>&#8369 <?php echo $data[1]?></td>
								<td>&#8369 <?php echo $data[1]*$data[2]?></td>

								<td><a class="btn btn-danger" type="button" onclick="return confirm('Are you sure?')" href="removeitem.php?iid=<?=$data[0]?>">Remove</a></td>
							</tr>
							
					</tbody>
					<?php
					$ta=$ta+($data[1]*$data[2]);
						}
					?>
					<tfoot>
						<tr>
						<td colspan="4" align="right">Total Price</td>
						<td align="left">&#8369 <?php echo $ta ?></td>
						<td><a type="button" class="btn btn-success" href="drop.php">Proceed and Checkout</a></td>
					</tr>
					</tfoot>
					
					
				</table>
			</div>
		</div>
	</div>
</div>
</body>
</html>