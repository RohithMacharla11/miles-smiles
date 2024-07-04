<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/contact.css">
  <script src="https://kit.fontawesome.com/8954b3c36f.js" crossorigin="anonymous"></script>
  <title>Contact</title>
</head>
<body>
<?php include('header.php'); 
  if(!isset($_SESSION["username"])){
    header("signin.php");
  }
?>
  
  <div class="section1">
    <h1 style="font-size: 55px;">Get in touch with our support team </h1>
    <h3 style="color: #5c5c5c;">We’re here 7 days a week.</h3>

    <div class="grid">
      <div style="background:#ffefdc;border-radius: 25px; padding:10px 20px 10px 20px; ">
        <h4 style="font-size: 25px;">Chat support</h4>
        <p>We support chat on our paid plans. Chat support<br> is available Monday - Friday 9AM-6PM ET. Please<br>
           log in to chat.</p>
           <a href="https://api.whatsapp.com/send/?phone=917780598470&text&type=phone_number&app_absent=0" style="text-decoration: none;">chat <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div style="background:#ffefdc;border-radius: 25px; padding:10px 20px 10px 20px; ">
        <h4 style="font-size: 25px;">Email support</h4>
        <p>Prefer to email? Send us an email and we’ll get<br> back to you soon.</p><br>
        <a href="mitta.dheeraj33@gmail.com" style="text-decoration: none;">Mail us <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="phone">
    <div class="icon-container">
      <a href="#"><i class="fa-solid fa-phone"></i></a>
    </div>
    <div class="text-container">
      <p>Speak to our Customer Care <br>Representative at +91 7418529630</p>
    </div>
  </div>

  <!--IMAGE----------------------------->
  <!-- <section class="et-section et-section--grey-background et-section--no-padding-xs">
    <div class="et-section__wrapper">
        <div class="et-featured-review">
            <picture class="et-featured-review__image-wrapper">
                <source media="(min-width: 900px)"
                        srcset="https://cdn.easyterra.com/images/themes/autohuren/featured-review.jpg 1x,
                                https://cdn.easyterra.com/images/themes/autohuren/featured-review@2x.jpg 2x">
                <img src="https://cdn.easyterra.com/images/themes/autohuren/featured-review.jpg"
                     alt=""
                     class="et-featured-review__image"
                     style="content-visibility: auto"
                     decoding="async"
                     loading="lazy"
                     height="400"
                     width="569">
            </picture>
            <div class="et-featured-review__content">
                <div class="et-featured-review__label">Customer experience</div>
                <div class="et-featured-review__title" >Good and reliable company for renting a car abroad</div>
                <div class="et-featured-review__text">Easy website, easy phone contact when I had questions. Everything well-organized. Friendly staff. Have rented a car through this company several times and have always been very satisfied.</div>
                <div class="et-featured-review__footer"></div>
            </div>
        </div>
    </div>
</section>
   -->
  
  <!-- footer menu------------------->
   <div class="footmeanu">
   <div><p style="font-weight: 800;font-size: 24px;">Platform &nbsp;
    <a style="font-size: 18px" href="#">Sign up free</a>&nbsp; <a style="font-size: 18px" href="#">Pricing</a></p>
  </div>
   </div>


</body>
</html>

<?php include('footer.php'); ?>