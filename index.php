<?php include 'connection.php' ?>
<?php include 'header.php' ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div class="container-fluid mt-2">
  <div class="row" >
    <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <img class="d-block " src="images/1.jpg" alt="First slide" height="400px" width="100%">
                </div>
                <div class="carousel-item" >
                    <img class="d-block " src="images/2.jpg" alt="Second slide" height="400px" width="100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block " src="images/3.jpg" alt="Third slide" height="400px" width="100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
</div>
<?php include 'footer.php' ?>
</body>
</html>