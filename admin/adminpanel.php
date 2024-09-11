<!-- 


<html>
<body>
<h1 align="center">Welcome to Admin Panel</h1>
<h2 align="right"><a href="signout.php">Sign out</a></h2>
<br><br><br>
<a href="membersinfo.php"> Users Detail </a><br>
<a href="products.php"> Products </a>



</body>
</html> -->





<html>
<?php
session_start();
if(!$_SESSION['username']){
	header("location: adminindex.php");
}
else{
?>


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
            .form1 a{
                font-size:40px;
                color:lightgrey ;
                text-decoration: none;
                display: block;
            }
        </style>
    </head>
    <body>
        <center><h1>Welcome to Admin Panel</h1></center>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 adminindex">
                    <form class="form1" method="post" action="adminindex.php">
                        <center>
                            <h2 align="right"><a href="signout.php">Sign out</a></h2>
                            <br><br><br>
                            <a href="membersinfo.php"> Users Detail</a><br>
                            <a href="products.php"> Products</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}
?>
