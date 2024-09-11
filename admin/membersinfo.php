<?php
session_start();
if(!$_SESSION['username']){
	header("location: adminindex.php");
}
else{
include("../connection.php");

if(isset($_GET['del'])){
	$del_mem = mysqli_real_escape_string($conn,$_GET['del']);
	$query = "delete FROM meminfo WHERE ID = '$del_mem'";
	if(mysqli_query($conn,$query)){
		echo "<script>window.open('membersinfo.php','_self')</script>";
	}
}	
?>
<html>
    <head>
        <style>
            body{
                background-color: lightgray;
            }
            td{ 
                background-color: #EFD469;
                color:#373D3F;
                font-size: 20px; 
            }
            th{
                font-size:25px;
                padding:10px;
                height:50px;
            }
            table{
            margin-top: 50px;
            border-radius: 10px;
            }
            button{
                background-color: #373D3F;
                color:#EFD469;
                width: 100%;
                height: 50px;
                font-size: 25px;
                border-radius: 5px;
            }
        </style>
    </head>
<body>

<a href="adminpanel.php" style="color:#093145;font-size:30px; text-decoration:none;">Back to Home</a>
<h1 align='center'><font size='6'><u>USERS' INFORMATION</u></font></h1><br/><br/><br/>

<table width='1000' align='center' border='1' cellpadding="5">
     <tr bgcolor='#093145' style="color:#EFD469;">
	     <th>NO.</th>
		 <th>NAME </th>
		 <th>USERNAME</th>
		 <th>HASH</th>
		 <th>SALT</th>
		 <th>CONTACT</th>
		 <th>DATE</th>
		 <th>DELETE</th>
	 </tr>
	
<?php

    $query = "SELECT * FROM meminfo";
	$run=mysqli_query($conn,$query);
	while ($row=mysqli_fetch_array($run)){
		
		$id=$row['ID'];
		$name=$row['NAME'];
		$username=$row['USERNAME'];
		$hash=$row['HASH'];
		$salt=$row['SALT'];
		$telephone=$row['CONTACT'];
		$date=$row['DATE'];

?>
     <tr align='center'>
         <td><?php echo $id; ?></td>
         <td><?php echo $name; ?></td>
         <td><?php echo $username; ?></td>
         <td><?php echo $hash; ?></td>
         <td><?php echo $salt; ?></td>
         <td><?php echo $telephone; ?></td>
         <td><?php echo $date; ?></td>
         <td><button type="button" onclick="window.location='membersinfo.php?del=<?php echo $pro_id; ?>';" >DELETE</button></td>
	 </tr>
	<?php }
}	
	//session_destroy();
	?>

</table>
</body>
</html>

