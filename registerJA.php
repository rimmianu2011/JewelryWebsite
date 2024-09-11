<!DOCTYPE html>
<html lang="en-US">
    <?php 
    session_start();
    include("headnavJA.php");  ?>
    <?php
include("connection.php");
if(isset($_POST['signup'])){
	
	$code = $_SESSION['cap_code'];
	$user_cap = mysqli_real_escape_string($conn,$_POST['cap']);
	$name= mysqli_real_escape_string($conn,$_POST['name']);
	$cont = mysqli_real_escape_string($conn,$_POST["contact"]);
	//echo"<script>alert($contact)</script>";
	$add = mysqli_real_escape_string($conn,$_POST["address"]);
	$user_email = mysqli_real_escape_string($conn,$_POST["email"]);
	$user_pass= mysqli_real_escape_string($conn,$_POST["pass"]);
	$user_conpass= mysqli_real_escape_string($conn,$_POST["conpass"]);
	
	if($user_pass == $user_conpass){
		if($code==$user_cap){
			$query = "SELECT * FROM meminfo WHERE USERNAME='$user_email'";
			$result = mysqli_query($conn,$query);
			$row_count = mysqli_num_rows($result);
			if($row_count != 0){
				echo"<script>alert('THIS EMAIL ALREADY EXISTS. TRY ANOTHER ONE!')</script>";
	            echo "<script>window.history.back()</script>";
	            exit();	
			}
			$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
			$password = hash('sha256', $user_pass . $salt); 
			$active = 0;
			for($round = 0; $round < 65536; $round++) 
			{ 
				$password = hash('sha256', $password . $salt); 
			}
			//echo"<script>alert($cont)</script>";
			$insert_query =  "insert into meminfo (NAME,CONTACT,ADDRESS,USERNAME,PASSWORD,HASH,SALT,ACTIVATION) 
             values('$name','$cont','$add','$user_email','$user_pass','$password','$salt','$active')";
			 
			if(mysqli_query($conn,$insert_query)){
				$to      = $user_email; // Send email to our user
				$subject = 'Signup Verification'; // Give the email a subject 
				$message = '
					Thanks for signing up!
					Your account has been created, you can login after you have activated your account by pressing the url below.

					Please click this link to activate your account:
					http://www.xyz.com/signup.php?activation='.$user_email.'='.$salt.'
				 
				'; // Our message above including the link
				$headers = 'From: hudagm4@gmail.com' . "\r\n"; // Set from headers
				$mail = mail($to, $subject, $message, $headers); // Send our email
				
				if($mail){
					echo"<script>alert('Registeration Successfull & an activation link is sent to your email!')</script>";
					echo"<script>window.open('index.php','_self')</script>";
				}else{
					echo"<script>alert('Error Sending mail!')</script>";
					echo "<script>window.history.back()</script>";
					exit();
				}			
			}else{
				echo"<script>alert('Some Error Occured!')</script>";
				echo "<script>window.history.back()</script>";
				exit();
			}
			
		}else{
		  echo "<script>alert('Wrong Captcha try again')</script>";
		  echo "<script>window.history.back()</script>";
		  exit();
		}
		
	}else{
	   echo "<script>alert('Confirm Password did not match!')</script>";
	   echo "<script>window.history.back()</script>";
	   exit();
   }
}
?>

<?php
if(isset($_GET['activation'])){
	$str = $_GET['activation'];
	$ar = (explode("=",$str));
	$ar[0];  //email
	$ar[1];  // salt
	if($ar[0]=="" || $ar[1]==""){
		echo "<script>alert('Improper information provided!')</script>";
	}else{
		$chk1 = "SELECT * from meminfo WHERE USERNAME='$ar[0]' AND SALT='$ar[1]' AND ACTIVATION='0' ";
		$chk2 = mysqli_query($conn,$chk1);
		if(mysqli_num_rows($chk2) == "1"){
			$chk3 = "update meminfo set ACTIVATION='1' where USERNAME='$ar[0]' AND SALT='$ar[1]'";
			$chk4 = mysqli_query($conn,$chk3);
			if($chk4){
				echo "<script>alert('Your account is Activated you can sign in now!')</script>";
				echo"<script>window.open('login.php','_self')</script>";
		echo"<script>window.open('index.php','_self')</script>";
		exit();
			}
		}else{
			echo "<script>alert('Improper information provided!!')</script>";
		}
	}
}
?>
    <body>
        <!-- form starts here -->
        <div class="col-md-12">
            <div class="row bg-img">
                <div class="col-md-offset-3 col-md-5">
                    <br>
                    <div class="reg_card">
                        <div class="inner_card">
                            <form class="form-inline" method="POST" action="">
                                <div class="col-md-6 formJA">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Enter Your Name..." name="name" required>
                                        </div>
                                    </div> 
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" placeholder="Enter Your Email..." name="email" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Contact Number..." name="contact">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Enter Address..." name="address">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" placeholder="Enter Your Password..." name="pass" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-4">    
                                            <input type="password" class="form-control" placeholder="Confirm Password..." name="conpass" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                       <input type="checkbox" class="btn btn-success" name="condition">
                                        I accept JA's Terms of Service 
                                    </div>
                                    <br><br>
                                </div>
                                <div class="col-md-6 formJA">
                                    <div class="form-group">
                                    <img src='captcha.php' style="height:50px;width:200px;">
                                    <br><br>
                                        <center><input type='text' name='cap' placeholder='Enter Captcha' class="form-control input-sm" required /></center>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <input type="submit" name="signup" class="btn btn-info" value="Signup">
                                    </div>
                                    <hr>
                                    <div class="col-md-16 remember">
                                    <i>Already a Member?<a href="loginJA.php"> Login Here</a></i>
                                    </div>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--form ends here-->
    </body>
    
</html>