
<?php
session_start();
include("connection.php");
?>
<?php
include("headnavJA.php");
?>
<!--- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link src="css/pro_des.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>

  <body>
	<div class="card_view">
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
                    
					<div class="details col-md-6">
						  <div class="tab-pane"><img src="img/bangles/g/bg1.jpg" alt="jewellery" style="height:400px; width:500px;" ></div>
						
						
				
						<h3 class="product-title">men's shoes fashion</h3>
                        <br>
						<p class="product-description">
                        </p>
                        <br>
						<h4 class="price">current price: <span></span></h4>
                        <br>
						<div class="action">
                            <button type="button" class="btn btn-sm btn-info">Add to cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
  </body>
</html>