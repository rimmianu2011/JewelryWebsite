
<?php
session_start();
include("connection.php");
if(isset($_GET['atc']) && isset($_GET['cat'])){
	$getpro_id = $_GET['atc'];   
	$getpro_cat = $_GET['cat'];
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

	$check_pro = "SELECT * FROM cart WHERE IP='$ipaddress' AND PRO_ID='$getpro_id' AND PRO_CAT='$getpro_cat'";
	$run_check = mysqli_query($conn,$check_pro);
	if(mysqli_num_rows($run_check)>0){
		echo "<script>alert('You have already this product in cart!')</script>";
		echo"<script>window.history.back()</script>";
		exit();
	}else{
			$b1 = "INSERT into cart(IP,PRO_ID,PRO_CAT) values('$ipaddress','$getpro_id','$getpro_cat')";
			$b2 = mysqli_query($conn,$b1);
			echo"<script>window.history.back()</script>";
			exit();
	}
}
	
?>
<?php
include("headnavJA.php");
?>
<!--- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
   <!--- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link src="css/pro_des.css" rel="stylesheet">
    <link src="css/proJA.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--->
  </head>
  <body>
		<div class="container">
			<div class="description_card">
                    <?php
							if(isset($_GET['id']) && isset($_GET['cat'])){
								$pro_id = mysqli_real_escape_string($conn,$_GET['id']);
								$pro_cat = mysqli_real_escape_string($conn,$_GET['cat']);
								$p1 = "SELECT * FROM $pro_cat WHERE PRO_ID=$pro_id"; 
								$p2 = mysqli_query($conn,$p1);
								$p3 = mysqli_fetch_assoc($p2);
								$pro_img = $p3['IMAGE'];
                                $pro_title = $p3['TITLE'];
								$pro_price = $p3['PRICE'];
                                $pro_metal = $p3['METAL'];
								/*$pro_desc = $p3['DESCRIPTION'];*/
						?>
                <div class="col-md-12">
					<div class="col-md-7">
                        <div class="description_img">
						  <img src="img/<?php echo $pro_cat;?>/<?php echo $pro_img;?>" alt="" style="background-color:white;"></div>
                    </div>  
                        <div class="col-md-5">
                            <h3 class="product-title"><?php echo $pro_title; ?></h3>
                            <br>
                            <p class="product-description">
                            </p>
                            <p>Price: <span><?php echo $pro_price; ?></span></p>
                            <br>
                            <div class="action">
                                <button type="button" class="btn btn-success" style="background-color:#993366; color:#fcf8e3;font-size:25px;"onclick="location.href='product_des.php?atc=<?php echo $pro_id; ?>&cat=<?php echo $pro_cat; ?>';">Add to Cart</button>
                            </div>
                    </div>
                </div>
                    <?php
							}
							?>
				
			</div>
		</div>
  </body>
</html>