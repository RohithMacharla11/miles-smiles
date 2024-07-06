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
  if (!isset($_SESSION["username"])) {
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
        <a href="mailto:mitta.dheeraj33@gmail.com" style="text-decoration: none;">Mail us <i class="fa-solid fa-arrow-right"></i></a>
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
        <div class="fa-solid fa-map-location-dot" style="font-size: larger;">
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

  <?php
  // if (!empty($_POST["send"])) {
  //     $userName = $_POST["userName"];
  //     $userEmail = $_POST["userEmail"];
  //     $userPhone = $_POST["userPhone"];
  //     $userMessage = $_POST["userMessage"];
  //     $toEmail = "macharlarohith111@gmail.com";

  //     $subject = "Contact Form Submission from " . $userName;
  //     $mailHeaders = "From: " . $userEmail . "\r\n" .
  //                    "Reply-To: " . $userEmail . "\r\n" .
  //                    "Content-type: text/plain; charset=UTF-8\r\n";
  //     $mailBody = "Name: " . $userName . "\r\n" .
  //                 "Email: " . $userEmail . "\r\n" .
  //                 "Phone: " . $userPhone . "\r\n" .
  //                 "Message: " . $userMessage . "\r\n";

  //     if (mail($toEmail, $subject, $mailBody, $mailHeaders)) {
  //         $message = "Your contact information is received successfully.";
  //     } else {
  //         $message = "Failed to send email. Please try again later.";
  //         $error = error_get_last()['message'];
  //         echo "<div class='error'><strong>Error: $error</strong></div>";
  //     }
  // }  

  ?>
  <!-- <input type="hidden" name="access_key" value="e5a5e422-44ab-4d81-9b94-57e322a76fcd"> -->
  <!-- <form name="contactFormEmail" action="https://api.web3forms.com/submit" method="post"> -->
  <div class="contact-section">
    <div class="contact-image"></div>
    <div class="contact-form">
      <h2>Write Us</h2>
      <p>As a passionate explorer of the intersection between technology, art, and the natural world, I've embarked on a journey to unravel the fascinating connections that weave.</p>

      <!-- <form name="contactFormEmail" action="sendmail.php" method="post"> -->
      <form name="contactFormEmail" action="https://api.web3forms.com/submit" method="post">
        <input type="hidden" name="access_key" value="e5a5e422-44ab-4d81-9b94-57e322a76fcd">
        <input type="text" name="userName" id="userName" placeholder="Name" required>
        <input type="email" name="userEmail" placeholder="Email" id="userEmail" required>
        <input type="text" name="userPhone" placeholder="Phone Number" id="userPhone" required>
        <textarea name="userMessage" placeholder="Message" id="userMessage" required></textarea>
        <button type="submit" name="send" value="Submit">Send</button>
        <?php if (!empty($message)) { ?>
          <div class='success'>
            <strong><?php echo $message; ?></strong>
          </div>
        <?php } ?>
      </form>
    </div>
  </div>

</body>

</html>

<?php include('footer.php'); ?>