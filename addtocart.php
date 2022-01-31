 <?php
if (isset($_GET['uid'] ) && isset($_GET['iid']) && isset($_GET['price'])) {
	include'connection.php';
	$query="insert into cart (plant_id,user_id,price,qty) values(".$_GET['iid'].','.$_GET['uid'].','.$_GET['price'].',1)';
	$result=mysqli_query($con,$query);
	header("location:allPlanst.php");	
}
else
{
	header("location:allPlanst.php");
}
?>`			