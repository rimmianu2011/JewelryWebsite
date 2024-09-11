<head>
    <link href="img/icons/flowericon.png" rel="icon"type="text/css">
</head>
<body>
    <?php
session_start();
include("connection.php");
    include("headnavJA.php");
?>
<?php
 $connect = mysqli_connect("localhost", "root", "", "slit_pro");
 function make_query($connect)
 {
 $query = "SELECT * FROM carousel ORDER BY ID ASC";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#myCarousel" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#myCarousel" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="img/JA-master/'.$row["BANNER"].'" alt="jewellers" style="width:100%; height:100%;" />
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>

<div class="parallax">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
            <ol class="carousel-indicators">
                <?php echo make_slide_indicators($connect); ?>
            </ol>

<!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php echo make_slides($connect); ?>

        </div>

<!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

</div>
<div class="parallax_f">
    <div class="center">
        <p align="left" style="font-size:40px;">We design all of our jewellery in collaboration with the best jewellery- makers around the world!</p>
    </div>
</div>
</div>
<div class="parallax_view">
<div class="caption">
    <span class="border">
    <a href="productJA.php">VIEW MORE</a> <i class="fa fa-chevron-right"></i></span>
</div>
</div>
        
    </body>
<?php include("footerJA.php");?>