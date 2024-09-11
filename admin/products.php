<?php
session_start();
if(!$_SESSION['username']){
	header("location: adminindex.php");
}
else{
include("../connection.php");
?>
<html>
<head>
    <title>Adding New Product</title>
    <style>
        body{
            background-color: lightgrey;
            height: 100%;
        }
        .adminindex{
                padding-left: 25%;      
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
        .form1 ul{
                list-style: none;
                padding:0;
        }
        .form1 ul li a{
                font-size: 40px;
                color: lightgrey;
                text-decoration: none;
            }
    </style>
</head>
    <body>
        <center><h1>SELECT JEWELLERY CATEGORY</h1></center>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3col-md-6 adminindex">
                    <form class="form1" method="post">
                        <a align="left" href="adminpanel.php" style="color:lightgrey; font-size:30px; text-decoration:none;">Back to Home</a>
                        <center>
                            <ul>
                                <li><a href="add_rings.php">Rings</a></li><br>
                                <li><a href="add_earrings.php">Earrings</a></li><br>
                                <li><a href="add_pendants.php">Pendants</a></li><br>
                                <li><a href="add_necklaces.php">Necklaces</a></li><br>
                                <li><a href="add_bangles.php">Bangles</a></li><br>
                                <li><a href="add_occasions.php">Ocassions</a></li><br>
                                
                            </ul>
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