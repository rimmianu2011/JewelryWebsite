<head>
    <title>Jewellers' Arena::Contact Us</title>
    <link href="img/icons/flowericon.png" rel="icon"type="text/css">
</head>
<?php
session_start();
include("headnavJA.php");
?>
<?php
include("connection.php");
if(isset($_POST['submit'])){
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $user_email = mysqli_real_escape_string($conn,$_POST["email"]);
    $message = mysqli_real_escape_string($conn,$_POST["message"]);
    
    $insert_query =  "INSERT INTO contact (NAME,EMAIL,MESSAGE) 
             values('$name','$user_email','$message')";
    $queryexe = mysqli_query($conn, $insert_query);
}

?>
<!-- Photo Grid -->
<div class="contactus">
    <img src="img/full/f22.jpg" alt="Jewellers Arena">
    <div class="center">
        <h1 style="font-size:60px">CONTACT US</h1>
        <p style="font-size:40px">Reach out to us and we will help you!</p>
    </div>
</div>
<div class="row">
    <div class="column">
        <div class="visitus">
           <div class="container-fluid">
               <h1 style="font-size:45px;font-family:Vollkorn,Georgia,Times,serif;color:black;letter-spacing: 4px;">VISIT OUR STORE</h1>
               <hr><br>
               <p>JEWELLERS' ARENA</p>
               <p>COTTON CANDY LAND, UTOPIA</p>
               <p>CONTACT : 404</p>
               <p>EMAIL : <a href="mailto:hudagm4@gmail.com | anushkayadav97@gmail.com" target="_blank">hudagm4@gmail.com | anushkayadav97@gmail.com</a></p>
               <br> 
               <h3>Open Monday - Saturday | 10am - 5pm</h3>
               <br><br>
               <a href="mailto:hudagm4@gmail.com | anushkayadav97@gmail.com" class="mail" style="color:whitesmoke;">EMAIL US</a>
            </div> 
        </div>
        <img src="img/full/f2.jpg">
       </div>
      <div class="column">
          <img src="img/full/f3.jpg" style="height:50%;">
          <div class="container-fluid" style="background-color:whitesmoke; height:50%;">
              <div class="contactform">
                  <h1 style="font-size:45px;font-family:Vollkorn,Georgia,Times,serif;color:black;">CONTACT FORM</h1><hr>
                  <form id="form" class="contactform" method="POST">
                      <input id="name" type="text" placeholder="FULL NAME" name="name">
                      <input id="email" type="email" placeholder="E-MAIL"name="email">
                      <input id="message" type="text" placeholder="MESSAGE" name="message">
                      <input id="submit" type="submit" value="SUBMIT" name="submit">
                  </form>
              </div>
        </div>    
      </div>  
      <div class="column">
          <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=studyleague%20solutions%20dombivli&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe></div></div>
      </div>
      <div class="column">
          <img src="img/full/f1.jpg">
      </div>
</div>
<?php
include("footerJA.php");
?>
    