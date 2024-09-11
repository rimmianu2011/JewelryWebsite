<head>
    <title>Jewellers' Arena::Cart</title>
    <link href="img/icons/flowericon.png" rel="icon"type="text/css">
</head>
<?php session_start();
include("headnavJA.php"); 
?>
<body>
<?php
include("connection.php");

if(isset($_GET['del'])){
	$delid = $_GET['del'];
	$del1 = "DELETE FROM cart WHERE ID='$delid'";
	$del2 = mysqli_query($conn,$del1);
	echo"<script>window.open('cartJA.php','_self')</script>";
}


if(isset($_GET['qty'])){
	$cart_id = $_GET['qty'];
	$new_qty = $_POST['quant'];
	$up1 = "UPDATE cart SET QUANTITY='$new_qty' WHERE ID='$cart_id'";
	$up2 = mysqli_query($conn,$up1);
	echo"<script>window.open('cartJA.php','_self')</script>";
}


if(isset($_GET['bn']) && isset($_GET['cat'])){
	$getpro_id = $_GET['bn'];   
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
		//echo"<script>window.history.back()</script>";
		exit();
	}else{
			$b1 = "INSERT into cart(IP,PRO_ID,PRO_CAT) values('$ipaddress','$getpro_id','$getpro_cat')";
			$b2 = mysqli_query($conn,$b1);
			//echo"<script>window.history.back()</script>";
			//exit();
	}
}


?>
        
        <br>
         <div class="container" style="width:100%;"> 
            <ol class="breadcrumb" style="background-color: #993366;">
                <li class="breadcrumb-item active"><h2><b style="color:#f2f2f2;">CHECKOUT</b></h2></li>
            </ol>
         </div>
        
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-warning">
                        <div class="panel-heading cartpanel">
                           <center><h2>CHECKOUT</h2></center>
                        </div>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Delete</th>
                                        <th>Checkout</th>
                                    </thead>
                                    <tbody>
									<?php
									$total_p = 0;
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

									$p1 = "SELECT * FROM cart WHERE IP='$ipaddress' ";
									$p2 = mysqli_query($conn,$p1);
									$i = 0;
										while($p3 = mysqli_fetch_assoc($p2)){
											$pc_id = $p3['ID'];
											$pid = $p3['PRO_ID'];
											$pcat = $p3['PRO_CAT'];
											$pro1 = "SELECT * FROM $pcat WHERE PRO_ID='$pid'";
											$pro2 = mysqli_query($conn,$pro1);
											$pro3 = mysqli_fetch_assoc($pro2);
												$title = $pro3['TITLE'];
												$price = $pro3['PRICE'];
												$qty = $p3['QUANTITY'];
												$stotal = $qty*$price;
												$total_p += $stotal;
												$i++;
									?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $price; ?> /-</td>
											<form method="POST" action="cartJA.php?qty=<?php echo $pc_id; ?>"> 
                                            <td><input type="number" name="quant" min="1" value="<?php echo $qty; ?>"></td>
											</form>
                                            <td><?php echo $stotal; ?>/-</td>
                                            <td><button type="button" class="btn btn-danger" onclick="window.location='cartJA.php?del=<?php echo $pc_id; ?>';" >X</button></td>
                                        </tr>
									<?php
									}
									?>
                                        <tr>
                                            <td colspan="4">Total Price :</td>
                                            <td colspan="2"><?php echo $total_p; ?></td>
                                            <td><button type="button" class="btn btn-success" style="background-color:#993366; color:#fcf8e3;font-size:25px;" onclick="window.location='checkoutJA.php';">Checkout</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <script type="text/javascript" src="vendor/jquery/jquery.js"></script>
    </body>
</html>  