<!DOCTYPE html>
<html>
<head>
    <title>Cars Rental</title>
    <link rel="stylesheet" href="css/about.css">
    <script src="https://kit.fontawesome.com/8954b3c36f.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php include('header.php');
    if(!isset($_SESSION["username"])){
      header("signin.php");
    }
  ?>
  <!--HEADER_____________________________________________________________________________________-->

  <div class="heading">encouraging individuals to experience<br> the thrill and freedom of travel</div>
  <div class="para">Our company is striving to become the India`s reliable car rental platform.
     Our goal is to simplify the process of renting a vehicle.<br> 
    They are committed to making the booking process clear, effortless, and enjoyable.</div>
  
<!--image srcccccccccccc-->
<div class="img" >

</div>
<!--flexbox their -->
<div class="focus">
  <div class="side" style="justify-content: center;padding-top: 5.5rem;">
    <h1 style="font-size: 50px;">Focusing On</h1>
    <p style="margin-top: 25px;font-size: 20px;">Our team puts in relentless effort to ensure our<br> customers can easily
      find the ideal rental car<br> for their needs. Part of this involves providing<br>
       clear and exact cost information. We believe in<br> transparency, which is
       why we ensure all<br> compulsory charges are included in the price<br> shown
       to customers, eliminating any unexpected<br> surprises upon arrival.<br>
      </p>
  </div>
  <div class="circles">
    <img src="css/images/Blue.png" height="450px" width="450px">
  </div>
</div>



<?php include('footer.php'); ?>
</body>
</html>

