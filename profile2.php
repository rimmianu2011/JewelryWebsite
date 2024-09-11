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

$chk1 = "SELECT * FROM meminfo WHERE IP='$userip'";
$chk2 = mysqli_query($conn,$chk1);
while($chk3 = mysqli_fetch_assoc($chk2)){
	$name = $chk3['NAME'];
	$email = $chk3['USERNAME'];
	$contact = $chk3['CONTACT'];
    $address = $chk3['ADDRESS'];
}
}
?>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/profile2.css" rel="stylesheet">
</head>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h3>
                                        NAME: <?php echo $name; ?>
                                    </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
        <!---YOHOOO-->      <div class="profile-work">
                            <p><b>MY ACCOUNT</b></p>
                            <a href="#">PERSONAL INFORMATION</a><br>
                            <a href="#">SHIPPING ADDRESS</a><br>
                            <a href="#">ORDER HISTORY</a><br>
                            <a href="#">MY WISHLIST</a><br>
                            <a href="#">MY WALLET</a><br>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NAME</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $name;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>EMAIL</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CONTACT</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $contact; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>ADDRESS</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $address; ?></p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <button type="button" class="btn btn-success" onclick="window.location='signup.php';">LOG OUT</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>