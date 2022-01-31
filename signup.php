<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript">

        function matchpass()
        {
            var firstpwd=document.f1.pwd.value;
            var secondpwd=document.f1.cpwd.value;
            if(firstpwd==secondpwd)
            {
                return true;
            }
            else
            {
                alert("password must be same!");
                return false;
            }
        }
    </script>

</head>
<body>
	<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
           <?php
                include 'connection.php';
                if (isset($_POST['email']))
                {
                    $cemail=$_POST['email'];
                    $q="select email from user where email= '$cemail'";
                    $result=mysqli_query($con,$q);
                    $total=mysqli_num_rows($result);
                    if ($total==1) 
                    {
                       ?>
                       <h2 class="text-center alert alert-danger">THIS EMAIL ALREDY IN YOUR TABLE</h2>
                       <?php
                    }
                    else
                    {

                if(isset($_POST['submit']))
                {
                    
                    $ufname=$_POST['fname'];
                    $ulname=$_POST['lname'];
                    $mob=$_POST['mob'];
                    $address=$_POST['address'];
                    $email=$_POST['email'];
                    $gen=$_POST['gen'];
                    $pwd=$_POST['pwd'];
                
                    
                

                    $query = "insert into user(fname,lname,gender,email,mob,address,pass)values('$ufname','$ulname','$gen','$email','$mob','$address','$pwd')";
                    
                    $msg=mysqli_query($con,$query);

                    
                    if($msg)
                    {
                        header("location:login.php");
                       
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <center>Register successfully</center>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <center>Try Again!!!!</center>
                        </div>
                        <?php
                    }
                }
            }
            }
           ?>
        </div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="text-center alert alert-primary">Register</h2>
                </div>
                <form action="signup.php" name="f1" method="post" onsubmit="return matchpass()">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <center><i><h4> First Name </h4></i></center>
                                    <input type="text" name="fname" placeholder="First Name" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <center><i><h4> Last Name </h4></i></center>
                                    <input type="text" name="lname" placeholder="Last Name"  class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <center><i><h4> Contect No</h4></i></center>
                                    <input type="number" name="mob" placeholder="Contect No"  class="form-control"/>
                                </div>
                           </div>
                            <div class="col">
                                <div class="form-group">
                                    <center><i><h4> Gender </h4></i></center>
                                    <select name="gen" class="form-control">
                                        <option value="male" selected> Male</option>
                                        <option value="female"> Female</option>
                                        <option value="other"> Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <center><i><h4>Email Id </h4></i></center>
                                    <input type="email" name="email"  placeholder="Email" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <center><i><h4>Password </h4></i></center>
                                    <input type="password" name="pwd" id="pwd" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <center><i><h4>Confirm Password </h4></i></center>
                                    <input type="password" name="cpwd" id="cpwd" placeholder="Re-Password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col">
                        		<div class="form-group">
                        			 <center><i><h4>Address </h4></i></center>
                        			 <input type="text" name="address" placeholder="Address" class="form-control">
                        		</div>
                        	</div>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-warning">
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">RESET</button>
                        <p class="text-center">Already have an account? <a href="login.php">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>