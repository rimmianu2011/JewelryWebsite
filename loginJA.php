<!DOCTYPE HTML>
<html>
    <head>
        <title>Jewellers' Arena::Log In</title>
        <link href="img/icons/flowericon.png" rel="icon"type="text/css">
    </head>
    <body>
        <?php
        session_start();
        include("headnavJA.php");
        ?>
        <?php
        include("connection.php");
        if(isset($_POST['forgot_pass'])){
            echo "<script>window.open('forgot.php','_self')</script>";
            exit();
        }
        if(isset($_POST['signin'])){
            $username=mysqli_real_escape_string($conn,$_POST['user_name']);
            $password=mysqli_real_escape_string($conn,$_POST['pass_word']);
            $remember=mysqli_real_escape_string($conn,$_POST['remember']);
            
            $q1 = "SELECT * FROM meminfo WHERE USERNAME='$username'";
            $q2 = mysqli_query($conn,$q1);
            if(mysqli_num_rows($q2) == 1){
                $q3 = mysqli_fetch_assoc($q2);
                $salt = $q3['SALT'];
                $db_hash = $q3['HASH'];
                $activation = $q3['ACTIVATION'];
                $pass = hash('sha256', $password.$salt);
                
                 for($round = 0; $round<65536; $round++){
                            
                            $pass = hash('sha256', $pass . $salt);
                        }
                if($db_hash == $pass){
                    if($activation == 1){
                        $_SESSION['user_name'] = $username;
                        echo "<script>window.open('indexJA.php','_self')</script>";
                        if($remember == "on"){
                            setcookie("uname", $username, time()+86400*15, "/");
                            setcookie("upass", $password, time()+86400*15, "/");
                        } else{
                            setcookie("uname", $username, time()-86400*15, "/");
                            setcookie("upass", $password, time()-86400*15, "/");
                        }
                        
                    } else{
                        echo "<script>alert('account not activated!')</script>";
                        echo "<script>window.open('loginJA.php','_self')</script>";
                        exit();
                    }
                    
                } else{
                    echo "<script>alert('incorrect password!')</script>";
                    echo "<script>window.open('loginJA.php','_self')</script>";
                    exit();
                }
                
            }else{
               echo "<script>alert('invalid email id!')</script>";
               echo "<script>window.open('loginJA.php','_self')</script>";
               exit();
            } 
        }
        ?>
        <!-- login starts here -->
        <div class="col-md-12">
            <div class="row bg-img">
                <div class="col-md-offset-3 col-md-5">
                    <br><br>
                    <div class="reg_card">
                        <div class="inner_card">
                            <div class="greeting">
                                <center>Join Us Today!</center>
                            </div>
                            <br>
                            <center>
                            <form class="form-inline" method="POST" action="">
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" placeholder="Enter Your Email..." name="user_name" value="<?php
                                    if(isset($_COOKIE['uname'])){
                                        echo $_COOKIE['uname'];
                                    }
                                    ?>
                                    "
                                                   >
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" placeholder="Enter Your Password..." name="pass_word" value="<?php
                                    if(isset($_COOKIE['upass'])){
                                        echo $_COOKIE['upass'];
                                    }
                                    ?>
                                    "
                                                   >
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-16">
                                            <input type="checkbox" name="remember"> Remember me
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="submit" name="signin" class="btn btn-info" value="Sign In">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="col-md-16 remembers">
                                        <i>Don't have an account?<a href="registerJA.php"> Signup Here</a></i>
                                    </div>
                                </div>
                            </form> 
                            </center>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--login ends here-->
    </body>
</html>