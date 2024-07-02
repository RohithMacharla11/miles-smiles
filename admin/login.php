<?php 
session_start();
include('includes/header.php');
?>

<!-- partial:index.partial.html -->
  <div id="container">
    <!-- Cover Box -->
    <div id="cover">
      <!-- Sign Up Section -->
      <h1 class="sign-up">Hello, Admin!</h1>
      <p class="sign-up">Enter your personal details<br> and start a journey with us<br><br>Not an admin no worries click below</p>
      <a class="button sign-up" href="#">Switch to User</a>
    </div>
    <!-- Login Box -->
    <div id="login">
      <h1>Sign In</h1>
      <?php
      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h2 class="bg-danger"> ' .$_SESSION['status']. ' </h2>';
        unset($_SESSION['status']);
      }
      ?>
      <a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/59/59439.png"></a>
      <a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/49/49026.png"></a>
      <a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/34/34227.png"></a>
      <p>or use your email account:</p>
      <form action="code.php" method="post">
        <input type="text" name="username" autocomplete="off" placeholder="Username" required />
        <input type="password" name="password" autocomplete="off" placeholder="Password" required /><br>
        <!-- <a href="#">Forgot password?</a><br> -->
        <input type="submit" class="submit-btn" name="login_btn" />
      </form>
    </div>
  </div>
