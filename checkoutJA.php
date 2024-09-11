<?php
session_start();
if(!$_SESSION['user_name']){
	header("location: loginJA.php");
}
else{
include("connection.php");
$uname = $_SESSION['user_name'];

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
$userip = $ipaddress;

$chk1 = "SELECT * FROM cart WHERE IP='$userip'";
$chk2 = mysqli_query($conn,$chk1);
while($chk3 = mysqli_fetch_assoc($chk2)){
	$pid = $chk3['PRO_ID'];
	$pcat = $chk3['PRO_CAT'];
	$pqty = $chk3['QUANTITY'];
	$insertorder = "INSERT into orders(USER_NAME, PRO_ID, PRO_CAT, QUANTITY) values ('$uname','$pid','$pcat','$pqty')";
    $queryexe = mysqli_query($conn,$insertorder);
}
    if($queryexe){
		$cart_del1 = "delete from cart where IP='$userip'";
		$cart_del2 = mysqli_query($conn,$cart_del1);
	}
}
?>
<html>
<body> 
	<?php include("headnavJA.php");  ?>
    <div class="checkout">
    <!-- Photo Grid -->
        <h1 align="center">THANK YOU FOR ORDERING!</h1>
        <div class="row"> 
          <div class="column">
            <img src="img/full/f23.jpg">
          </div>
          <div class="column">
            <img src="img/full/f25.jpg">    
          </div>
        </div>	
            
    </div>
</body>
    <?php include("footerJA.php");  ?>
</html>