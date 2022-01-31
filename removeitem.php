<?php
if (isset($_GET['iid'])) 
{
	include'connection.php';
	$query="DELETE FROM cart WHERE id =".$_GET['iid'];
	$result=mysqli_query($con,$query);
	header("location:cart.php");
}
?>