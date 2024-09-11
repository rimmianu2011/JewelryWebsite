<?php
session_start();
if(!$_SESSION['username']){
	header("location: adminindex.php");
}
else{
include("../connection.php");

    if(isset($_GET['del'])){
	$delid = $_GET['del'];
	$del1 = "DELETE FROM bangles WHERE PRO_ID='$delid'";
	$del2 = mysqli_query($conn,$del1);
	echo"<script>window.open('add_bangles.php','_self')</script>";
}
?>
<html>
<head>
      <title>Adding New Product-Bangles</title>
      <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
      <script>tinymce.init({selector:'textarea'});</script>
    <style>
        body{
            background-color: lightgrey;
            height: 100%;
        }
        .insert_table{
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 0px 10px grey;
            height: 500px;
            width: 60%;
            background-color: #093145;
            color:#F2F3F4;
            font-size: 25px;
        }
        .insert_table td{
            font-size:30px;
        }
        .insert_table input[type=file],.insert_table input[type=text]{
            font-size: 20px;
            padding: 5px;
            border-radius: 5px;
            }
        .insert_table input[type=submit]{
            background-color: #EFD469;
            color:#373D3F;
            width: 40%;
            height: 50px;
            font-size: 25px;
            border-radius: 5px;
        }
        .desc_table{
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0px 0px 0px 5px grey;
            
        }
        .desc_table td{
           font-size: 30px; 
        }
        .desc_table td button{
            background-color: #EFD469;
            color:#373D3F;
            width: 100%;
            height: 50px;
            font-size: 25px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<a href="adminpanel.php" style="color:black; font-size:30px; text-decoration:none;">Back to Home</a>
<form action="add_bangles.php" method="POST" enctype="multipart/form-data">
    <table class="insert_table"align="center" cellpadding="10" width="750" border="2" bgcolor="#093145" style="color:lightgrey;">
	    <tr align="center">
            <td colspan="8"><h2>Add New Product-Bangles</h2> </td>
        </tr>		
		<tr>
		    <td align="center"><b> Image: </b></td>
			<td> <input type="file" name="product_image" required/> </td>
		<tr>
		
		<tr>
		    <td align="center"><b> Title: </b></td>
			<td> <input type="text" name="product_title" size='60' required/> </td>
		</tr>
		
		<tr>
		    <td align="center"><b> Price: </b></td>
			<td> <input type="text" name="product_price" size='60' required/> </td>
		</tr>
		
		<tr>
		    <td align="center"><b> Metal:</b></td>
			<!--product_keywords--><td> <input type="text" name="product_metal" size='50' required/> </td>
		</tr>
		
		<!--<tr>
		    <td align="center"> <b>Product Description:</b></td>
			<td><textarea name='product_desc' cols='20' rows='10' ></textarea></td>
		</tr>-->
		
		<tr align="center">
			<td colspan="8"> <input type="submit" name="insert_product" value="Add Product"> </td>
		</tr>
		</table>
</form>

<table class="desc_table" align="center" width="1400" border="2" cellpadding="20" bgcolor="#093145" style="color:lightgrey;">
	<tr>
		<td align="center"><b>NO.</b></td>
		<!--<td align="center"><b>GENDER</b></td>-->
		<td align="center"><b>IMAGE</b></td>
		<td align="center"><b>TITLE</b></td>
		<td align="center"><b>PRICE</b></td>
		<td align="center"><b>METAL</b></td>
		<!--<td align="center"><b>DESCRIPTION</b></td>
		<td align="center"><b>DATE</b></td>-->
		<td align="center"><b>DELETE</b></td>
	</tr>

<?php
if(isset($_POST['insert_product'])){
	$title = $_POST['product_title'];
	$price = $_POST['product_price'];
	$metal = $_POST['product_metal'];
	/*$desc = $_POST['product_desc'];*/
	
	$product_image = $_FILES["product_image"]["name"];                 /// image
	$product_image_tmp = $_FILES["product_image"]["tmp_name"];            /// image
	if($metal == "g"){
	move_uploaded_file($product_image_tmp,"../img/bangles/$product_image");      /// image
	}else{
	move_uploaded_file($product_image_tmp,"../img/bangles/$product_image");      	
	}
	
	$insert_product =  "INSERT INTO bangles(IMAGE,TITLE,PRICE,METAL)
	values('$product_image','$title','$price','$metal')";
	
	$product_insert = mysqli_query($conn,$insert_product); 
	
	if($product_insert){
		echo"<script>alert('PRODUCT ADDED!!')</script>";
		echo"<script>window.open('add_bangles.php','_self')</script>";
	}else{
		echo "query not executed!";
		die(mysqli_error($conn));
	}
}


$query = "SELECT * FROM bangles";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
        $pro_id = $row[0];
		$pro_img = $row[1];
		$pro_title = $row[2];
		$pro_price = $row[3];
		$pro_metal = $row[4];
?>		
		<tr>
		
			<td align="center"><?php echo $pro_id; ?></td>
			<?php
			if($pro_metal == "g"){
			?>
				<td align="center"><img src="../img/bangles/<?php echo $pro_metal; ?>/<?php echo $pro_img; ?>" alt="<?php echo $pro_img; ?>" width="200" height="200" style="border-radius:15px; background-color:white;"></td>
			<?php
			}else{
			?>
				<td align="center"><img src="../img/bangles/<?php echo $pro_metal; ?>/<?php echo $pro_img; ?>" alt="<?php echo $pro_img; ?>" width="200" height="200" style="border-radius:15px; background-color:white;"></td>
			<?php
			}
			?>
			<td align="center"><?php echo $pro_title; ?></td> 
			<td align="center"><?php echo $pro_price; ?></td> 
			<td align="center"><?php echo $pro_metal; ?></td>
            <td><button type="button" onclick="window.location='add_bangles.php?del=<?php echo $pro_id; ?>';" >DELETE</button></td>
	</tr>
<?php
}	
?>
</table>
</body>
</html>

<?php
}
?>