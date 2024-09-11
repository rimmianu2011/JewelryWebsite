<head>
    <title>Jewellers' Arena:: Silver Earrings</title>
    <link href="img/icons/flowericon.png" rel="icon"type="text/css">
</head>
    <body>
        <?php include("connection.php");
         include("headnavJA.php"); ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <?php
                    $s1 = "SELECT * FROM ear_ring WHERE METAL='s'";
                    $s2 = mysqli_query($conn,$s1);
                    
                    while($s3 = mysqli_fetch_assoc($s2)){
                        $pro_id = $s3['PRO_ID'];
                        $pro_img = $s3['IMAGE'];
                        $pro_title =  $s3['TITLE'];
                        $pro_price = $s3['PRICE'];
                ?>
                <div class="col-md-3">
                    <img src="img/ear_ring/<?php echo $pro_img;?>" class="image" style="height:300px; width:100%; overflow:hidden; border:2px solid grey; border-radius: 5px; box-shadow:2px 2px 3px grey;">
                <div class="middle">
                    <div class="text">
                        <center>
                            <button type="button" class="btn btn-sm btn-success"style="background-color:#993366; color:#fcf8e3;font-size:25px;"><a href="product_des.php?id=<?php echo $pro_id; ?>&cat=ear_ring" target="_self"style="color:#fff;">VIEW DETAILS</a></button>
                        </center>
                    </div>
                </div>
                </div>
        <?php
                    }
        ?>
            </div>
        </div>
    </body>
    <?php include("footerJA.php");?>