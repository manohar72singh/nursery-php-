<?php session_start()?>
<?php 
	if (isset($_SESSION['email'])) 
	{
		?>
		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Success</title>
</head>
<body>
	<center><i>
		<h1>Successfully Ordered.!</h1>
		<h2>Happy Shopping:)</h2>
		</i>	
	</center>
</body>
	</html>
<?php	
	}
	else
		header("location:login.php");	
?>
