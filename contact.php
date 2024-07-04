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
  <section class="contact-section2">
        <h2 style="font-size: 40px;">Get In Touch With Us</h2><br>
        <p class="contact-description">
            For who thoroughly her boy estimating conviction.
            Removed demands expense account in outward tedious do. Particular way thoroughly.
        </p>
        <div class="contact-info">
            <div class="contact-item">
                <div class="fa-solid fa-phone" style="font-size: larger;">
                <h3 style="margin-top: 5px;">Office Phone Number</h3>
                </div>
                
                <p>+91 7780598470</p>
            </div>
            <div class="contact-item">
            <div class="fa-solid fa-map-location-dot"style="font-size: larger;">
                <h3 style="margin-top: 5px;">Company Office Address</h3>
                </div>
               
                <p>969 Pine Street Grand Rapids, MI 49503</p>
                
            </div>
            <div class="contact-item">
                <div class="fa-solid fa-envelope" style="font-size: larger;">
                    <h3 style="margin-top: 5px;">Office Email Address</h3>
                </div>
                <p>carrental@gmail.com</p>
            </div>
        </div>
    </section>

  <div class="contact-section">
        <div class="contact-image"></div>
        <div class="contact-form">
            <h2>Write Us</h2>
            <p>As a passionate explorer of the intersection between technology, art, and the natural world, I've embarked on a journey to unravel the fascinating connections that weave.</p>
            <form action="submit_form.php" method="post">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="message" placeholder="Message" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>


</body>
</html>

<?php include('footer.php'); ?>