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

<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-compatible" Content="IE-edge">
        <meta name="viewport" content="width-device-width">
        <title>Studyleague IT Solutions - Web Intermediate</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style_des.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>

        
        <!--- Product Description --->
        <br>
         <div class="container"> 
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Pricing</li>
            </ol>
         </div>
        
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><b>Product Description : </b></h4>
                        </div>
						<?php
							if(isset($_GET['id']) && isset($_GET['cat'])){
								$pro_id = mysqli_real_escape_string($conn,$_GET['id']);
								$pro_cat = mysqli_real_escape_string($conn,$_GET['cat']);
								$p1 = "SELECT * FROM $pro_cat WHERE PRO_ID=$pro_id"; 
								$p2 = mysqli_query($conn,$p1);
								$p3 = mysqli_fetch_assoc($p2);
								$pro_title = $p3['TITLE'];
								$pro_img = $p3['IMAGE'];
								$pro_price = $p3['PRICE'];
								$pro_brand = $p3['BRAND'];
								$pro_imei = $p3['IMEI'];
								$pro_model = $p3['MODEL'];
								$pro_desc = $p3['DESCRIPTION'];
						?>
                        <div class="panel-body">
                            <div class="col-md-4">
                               <center>
                                   <img src="image/products/mobile/<?php echo $pro_img; ?>" alt="" >
                                </center> 
                            </div>
                            <div class="col-md-8">
                                <h4><b><?php echo $pro_title; ?></b></h4>
                                <hr style="border:1px solid black">
                                <br>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <th>Details</th>
                                        
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td>Brand Name :</td>
                                            <td><?php echo $pro_brand; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Model :</td>
                                            <td><?php echo $pro_model; ?></td>
                                        </tr>
                                        <tr>
                                            <td>IMEI :</td>
                                            <td><?php echo $pro_imei; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Price :</td>
                                            <td><?php echo $pro_price; ?> /-</td>
                                        </tr>
                                        <tr >
                                            <td>
                                                <button type="button" class="btn btn-success" onclick="location.href='pro_des.php?atc=<?php echo $pro_id; ?>&cat=<?php echo $pro_cat; ?>';">Add to Cart</button>
                                            </td>
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger"><a href="cart.php?bn=<?php echo $pro_id; ?>&cat=<?php echo $pro_cat; ?>" style="color:#fff;">Buy Now</a></button>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td colspan="2"><?php echo $pro_desc; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
							<?php
							}
							?>
                    </div>
                </div>
            </div>
        </div>
        
        <!--- Product Description Ends Here --->

        
        <script type="text/javascript" src="vendor/jquery/jquery.js"></script>
    </body>
</html>  