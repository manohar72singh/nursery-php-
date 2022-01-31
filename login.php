<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta charset="UTF-8">
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
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
        	<?php 
        		include 'connection.php';
        		if (isset($_POST['submit']))
        		{
        			
        		
        		$email=$_POST['email'];
        		$pwd=$_POST['pwd'];
        		$q=("select * from user where email like '".$email."'and pass like '".$pwd."'");
        		$msg=mysqli_query($con,$q);
        		$total=mysqli_num_rows($msg);
                $data=mysqli_fetch_row($msg);
                //$row  = mysqli_fetch_array($result);
        		if($total==1)
        		{
        			session_start();
                    $_SESSION['id']=$data[0];
        			$_SESSION['email']=$data[5];
                    $_SESSION['name']=$data[1]." ".$data[2];
                    $_SESSION['gender']=$data[3];
                    $_SESSION['mob']=$data[4];
                    $_SESSION['address']=$data[6];
        			header("location:index.php");

        			?>
        			<!--<div class="alert alert-success mt-3" role="alert">
                		<center>login succefull</center>
            		</div>-->
            		<?php
        		}
        		else
        		{
        			?>
        			<div class="alert alert-danger mt-3" role="alert">
                		<center>invallid email or password</center>
            		</div>
        			<?php
        		}
        	}
        	?>
            

        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card mt-4">
                <div class="card-header">
                     <h2 class="text-center alert alert-primary">Login</h2>
                </div>
                <form action="login.php" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <center><i><h4> Email Id </h4></i></center>
                            <input type="email"name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <center><i><h4> Password </h4></i></center>
                            <input type="password"name="pwd" class="form-control" placeholder="Password" required >
                        </div>
                    </div>
                    <div class="card-footer text-center bg-warning">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <p class="text-center">Already have an account? <a href="signup.php">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>