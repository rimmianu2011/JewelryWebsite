<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Jewellers' Arena::Welcome</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-compatible" Content="IE-edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="img/icons/flowericon.png" rel="icon"type="text/css">
        <!---<link href="css/bootstrapJA.css" rel="stylesheet">--->
        <link href="css/JAstyle.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!---PRODUCT PAGE--->
        <link href="css/pro_displays.css"s rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link src="css/product_dess.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <?php
        include("connection.php");
        ?>
        <!-- HEADER STARTS HERE -->
        <div class="header">
            <div class="col-md-12">
                <div class="col-md-1 icon">
                    <a href="contactJA.php"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-10 content">
                    <ul>
                        <li><a href="indexJA.php">Home</a></li>
                        <li><a href="productJA.php">Products</a></li>
                        <?php
							if (isset($_SERVER['HTTP_CLIENT_IP']))
								$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
							else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
								$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
							else if(isset($_SERVER['HTTP_X_FORWARDED']))
								$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
							else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
								$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
							else if(isset($_SERVER['HTTP_FORWARDED']))
								$ipaddress = $_SERVER['HTTP_FORWARDED'];
							else if(isset($_SERVER['REMOTE_ADDR']))
								$ipaddress = $_SERVER['REMOTE_ADDR'];
							else
								$ipaddress = 'UNKNOWN';
							$c1 = "SELECT * FROM cart WHERE IP='$ipaddress'";
							$c2 = mysqli_query($conn,$c1);
							$c3 = mysqli_num_rows($c2);
							
						?>
                        <li><a href="indexJA.php" class="logo"><img src="img/icons/flowericon.png" alt="Jewellers' Arena"></a></li>
                        <li><a href="registerJA.php">Register</a></li>
                        <?php 
							if(!@$_SESSION['user_name']){ 
							?>
                        <li><a href="loginJA.php">Login</a></li>
                        <?php
							}else{
							?>
							<a href="signout.php"> Logout</a>
							<?php
							}
							?>
                    </ul>
                </div>
                <div class="col-md-1 icon">
                    <a href="cartJA.php"><i class="fa fa-shopping-cart"></i>(<?php echo $c3; ?>)</a>
                </div>
            </div>  
        </div>
        <!-- HEADER ENDS HERE -->
        <!-- NAVBAR STARTS HERE -->
        <div class="navibar">
            <ul>
                <li>
                    <a href="rings.php">Rings <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="#">Gold</a></li>
                        <li><a href="#">Silver</a></li>
                    </ul>
                </li>
                <li>
                    <a href="ear.php">Earrings <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="#">Gold</a></li>
                        <li><a href="#">Silver</a></li>
                    </ul>
                </li>
                <li>
                    <a href="pendants.php">Pendants <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="#">Gold</a></li>
                        <li><a href="#">Silver</a></li>
                        </ul>
                </li>
                <li>
                    <a href="necklaces.php">Necklaces <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="#">Gold</a></li>
                        <li><a href="#">Silver</a></li>
                    </ul>
                </li>
                <li>
                    <a href="bangles.php">Bangles <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="#">Gold</a></li>
                        <li><a href="#">Silver</a></li>
                    </ul>
                </li>
                <li>
                    <a href="occassions.php">Occasions <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="#">Birthday</a></li>
                        <li><a href="#">Anniversary</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- NAVBAR ENDS HERE -->
    </body>
</html>