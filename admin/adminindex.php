<!DOCTYPE HTML>
<?php
include("../connection.php");
session_start();
if(isset($_POST["signin"])){

	$username = mysqli_real_escape_string($conn,$_POST["user_name"]);
	$password = mysqli_real_escape_string($conn,$_POST["pass_word"]);
	
		$ql = "SELECT USERNAME FROM admininfo WHERE USERNAME='$username'"; 
		$res = mysqli_query($conn,$ql);
		if (mysqli_num_rows($res) == 1){
			$ry = "SELECT USERNAME,PASSWORD FROM admininfo WHERE USERNAME='$username' LIMIT 1";
			$sql = mysqli_query($conn,$ry);
			$rows = mysqli_fetch_assoc($sql);
						if($password === $rows['PASSWORD']){
							@$_SESSION['username']=$username;
							echo"<script>window.open('adminpanel.php','_self')</script>";
							exit();	
						}else{
							echo"<script>alert('Wrong EMAIL or PASSWORD')</script>";
							echo"<script>window.history.back()</script>";
						}
										
				
		}else{
			echo"<script>alert('Wrong EMAIL or PASSWORD')</script>";
            echo"<script>window.history.back()</script>";
			exit();
		}
	
}

?>
<html>
    <head>
        <title>Admin Panel</title>
        <style>
            body{
               background-color: lightgrey;
                height: 100%;
            }
            h1{
                padding-left: 100px;
                color: #093145;
                font-size: 40px;
            }
            .adminindex{
                padding-left: 30%;
                
            }
            .form1{
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0px 0px 0px 10px grey;
                height: 500px;
                width: 60%;
                background-color: #093145;
                color:#F2F3F4;
                font-size: 25px;
            }
            .form1 input[type=password],.form1 input[type=text]{
                font-size: 20px;
                padding: 5px;
                border-radius: 5px;
            }
            .form1 button{
                background-color: #EFD469;
                color:#373D3F;
                width: 40%;
                height: 50px;
                font-size: 25px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <center><h1>ADMIN PANEL</h1></center>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 adminindex">
                    <form class="form1" method="post" action="adminindex.php">
                        <center>
                            <label>Username :</label> 
                            <input type="text"  placeholder="Enter Admin Username" name="user_name">
                            <br><br>
                            <label>Password :</label> 
                            <input type="password"  placeholder="Enter Admin Password" name="pass_word">
                            <br><br><br>
                            <button type="submit" name="signin" class="btnlogin">Sign In</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>