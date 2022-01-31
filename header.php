<?php session_start()?>
<?php include 'connection.php'?>
<?php 
$totalCartValue=0;
if (isset($_SESSION['email'])) 
{
  $totalCartValue = 0;
  $query="select count(*) total from cart where user_id=".$_SESSION['id'];
  $data=mysqli_query($con,$query);
  $row=mysqli_fetch_row($data);
  $totalCartValue=$row[0];
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<title>Nursery Online Shop</title>
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
	<div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">ONS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a style="margin-left: 15px;" class="nav-link" href="index.php"> <i class="fas fa-fw fa-home"> </i> Home <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item">
        <a style="margin-left: 15px;" class="nav-link" href="allPlanst.php"> <i class="fas fa-tree"> </i> Plants</a>
      </li>
      <li class="nav-item">
        <?php
        if (isset($_SESSION['email'])) 
        {
          echo '<a style="margin-left: 15px;" class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"> </i> Carts<sup><span class="badge badge-danger">'.$totalCartValue.'</span></sup></a>' ; 
        }
        else 
        {
          echo '<a style="margin-left: 15px;" class="nav-link" href="cart.php"> <i class="fas fa-shopping-cart"> </i> Carts<sup><span class="badge badge-light"></span></sup></a>';
        }?>
        
      </li>
      <li class="nav-item">
          <a style="margin-left: 15px;" class="nav-link" href="aboutus.php"> <i class="fas fa-address-card"> </i> About Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <?php
                          if (isset($_SESSION['email'])) 
                          {
                            echo '<a class="nav-link " href="#"><i class=" fas fa-user-circle" > '.$_SESSION['name'].'</i></a>';
                          }
                          else
                          {
                            echo '<a class="nav-link " href="signup.php"><i class="fas fa-user-alt "> Sign Up</i></a>';
                          }
                        ?>
                        
                    </li>
                    <li class="nav-item">
                      <?php
                        if (isset($_SESSION['email'])) 
                        {
                          echo '<a class="nav-link" href="logout.php"><i class=" fas fa-sign-out-alt"> Logout</i></a>';
                        }
                        else
                        {
                          echo '<a class="nav-link" href="login.php"><i class=" fas fa-sign-in-alt" > Login</i></a>';
                        }
                      ?>
                      </li>
                </ul>
    </form>
  </div>
</nav>
	</div>
</body>
</html>