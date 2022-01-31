

<?php include 'connection.php' ?>


<!DOCTYPE html>
<html>
<head>
	<title>plants</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	
<?php include 'header.php' ?>


<div class="row">
	<?php
	$query="SELECT * From plant ";
	$result=mysqli_query($con,$query);	
	while ($total=mysqli_fetch_array($result)) 
	{
	

		?>
		<div class="col-lg-3">
		<div class="card-mb-3">
			<div class="card-body">
				
					<center><img src="images/images.jpeg" style="width: 100px">
					<h4 class="text-info" name="name"><?php echo $total['name']; ?></h4>	
					<h5 class="text-info" name="qty">Available Qty:(<?php echo $total["quantity"]; ?>)</h5>
					<h4 class="text-danger" name="price">&#8369 <?php echo $total["price"]; ?>.00</h4>
					<input class="form-control" type="number" min="0" placeholder="Quantity" name="count" value="1">
					<?php 
					if (isset($_SESSION['email'])) 
					{
						?>
						<a href="addtocart.php?uid=<?= $_SESSION['id']?>&iid=<?=$total['id']?>&price=<?=$total['price']?>"> <button class="btn btn-primary mt-2">Add To Cart </button></a>
						<?php
					}
					else
					{
						?>
						<a href="#"> <button class="btn btn-primary mt-2">Add To Cart </button></a>
						<?php
					}
					?>
					</center>
			</div>
		</div>
	</div>
	
	
		
			
	<?php
	}

?>

</div>
</body>
</html>