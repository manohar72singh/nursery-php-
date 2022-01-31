<?php include('connection.php')?>
<?php include('header.php')?>
<?php 
if(!isset($_SESSION['email']))
{
	header('location:login.php');
}
else
{
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div class="row">
			<div class="col-lg-8">
				<div class="card m-3">
					<div class="card-header" style="background-color:white ;">
						<h2>Order Detail(s)</h2>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Product Name</th>
                                        	<th >Quantity</th>
                                        	<th >Price</th>
                                        	<th>Total</th> 
										</tr>
									</thead>
									<tbody style="font-size: 20px;">
										<?php
											$ta=0;
											$query="SELECT cart.id as cid, cart.price as price,cart.qty as qty, user.id as uid, plant.name as pname FROM cart JOIN user ON user.id=cart.user_id JOIN plant ON cart.plant_id=plant.id WHERE user.id=".$_SESSION['id'];

											$result=mysqli_query($con,$query);
											while ($data=mysqli_fetch_row($result)) 
											{
												?>
												<tr>
													<td><?php echo $data[4]?></td>
													<td><?php echo $data[2]?></td>
													<td>&#8369 <?php echo $data[2]*$data[1]?></td>
													<td>&#8369 <?php echo $data[2]*$data[1]?></td>
												</tr>
												<?php
												$ta=$ta+($data[1]*$data[2]);
											}
										?>
									</tbody>

	<?php
	
}
?>

								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card m-3">
					<div class="container">
						<div class="card-body">
							<h5><i class="fas fa-user-alt"> </i> <?php echo  strtoupper($_SESSION['name'])?></h5><br>
							<h5><i class="fas fa-map-marker-alt"></i> <?php echo strtoupper($_SESSION['address']) ?></h5><br>
							<h5><i class="fas fa-phone"></i> 0<?php echo $_SESSION['mob'] ?></h5><br>
							<h5><i class="fas fa-envelope"></i> <?php echo strtoupper($_SESSION['email']) ?></h5><br>
							 <h5><i class="fas fa-calendar"></i> DeliveryDate:<input type="date" name="del" style="width: 206px" required></h5><br>
							 <tr>
							 	<td>Payment Method</td>
							 	<td>
							 		<select onchange="totalprice()" class="form-control" id="paymethod" name="paymethod">
                        				<option value="Cash on Delivery">Cash on Delivery</option>
                        				<option value="Cash on Pickup">Cash on Pickup</option>
                     				</select>
							 	</td>
							 </tr>
							 <center><h3> Order Summary</h3></center>
							 <div class="row">
							 	<div class="col-lg-7">
							 		<h5>Subtotle</h5><br>
							 	</div>
							 	<div align="right" class="col-lg-4">

							 		<h5>&#8369 <?php echo $ta ?></h5>
							 	</div>
							 	<div class="col-lg-7" >
                            		<h5>Delivery fee</h5><br>
                            	</div> 
							 	<div align="right" class="col-lg-4">
                            	<h5>&#8369 <?php echo 150; ?></h5><br>
                            	</div> 
                            	<div class="col-lg-7">
                            	<h5>Total</h5><br>
                            	</div>
                            	<div align="right" class="col-lg-4">
                            <h5>&#8369 <?php echo $ta+150; ?></h5><br>
                            </div>                   
							</div>
							<center><button type="submit"  class="btn btn-lg btn-success"><a href="success.php">Submit Order</a></button></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
