<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Login/Registration</title>
<link rel="stylesheet" href="css/login.css">
<script type="text/javascript">
    function preventBack(){window.history.forward()};
    setTimeout("preventBack()",0);
        window.onunload=function(){null;}
</script>
</head>
<body>
<!-- partial:index.partial.html -->
<div id="container">
<!-- Cover Box -->
<div id="cover">
<!-- Sign Up Section -->
<h1 class="sign-up">Hello, Friend!</h1>
<p class="sign-up">Enter your personal details<br> and start a journey with us</p>
<a class="button sign-up" href="#cover">Sign Up</a>
<!-- Sign In Section -->
<h1 class="sign-in">Welcome Back!</h1>
<p class="sign-in">To keep connected with us please<br> login with your personal info</p>
<br>
<a class="button sub sign-in" href="#">Sign In</a>
</div>
<!-- Login Box -->
<div id="login">
<h1>Sign In</h1>
<a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/59/59439.png"></a>
<a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/49/49026.png"></a>
<a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/34/34227.png"></a>
<p>or use your email account:</p>
<form action="login.php" method="post">
    <input type="text" name="username" autocomplete="off"  placeholder="Username" required />
    <input type="password" name="password" autocomplete="off"  placeholder="Password" required /><br>
    <a href="#">Forgot password?</a><br>
    <input type="submit" class = "submit-btn" name="login" value="Login" />
</form>
</div>
<!-- Register Box -->
<div id="register">
<h1>Create Account</h1>
<a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/59/59439.png"></a>
<a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/49/49026.png"></a>
<a href="#"><img class="social-login" src="https://image.flaticon.com/icons/png/128/34/34227.png"></a>
<p>or use your email for registration:</p>
<form action="register.php" method="post">
    <input type="text" name="fullname" placeholder="Full name" required />
    <input type="text" name="username" autocomplete="off" placeholder="Username" required />
    <input type="email" name="email" placeholder="Email address" required />
    <input type="text" name="phone" placeholder="Phone" required />
    <input type="password" name="password" autocomplete="on" placeholder="Password" required />
    <div class="checkbox">
        <input type="checkbox" id="signupCheck" required />
        <label for="signupCheck">I accept all terms & conditions</label>
    </div>
    <input type="submit" class="submit-btn" name="signup" value="Signup" />
</form>
</div>
</div> <!-- END Container -->
<!-- partial -->

</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        $fullname = filter_input(INPUT_POST, "fullname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($fullname) || empty($username) || empty($phone) || empty($email) || empty($password)) {
            echo "All fields are required.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            try {
                $stmt = $conn->prepare("INSERT INTO users (FullName, UserName, EMail, Phone, Password) VALUES (:fullname, :username, :email, :phone, :password)");
                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hash);
                if ($stmt->execute()) {
                    echo "You are now registered!";
                } else {
                    echo "Error: " . $stmt->errorInfo()[2];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    } elseif (isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($username) || empty($password)) {
            echo "Both username and password are required.";
        } else {
            try {
                $stmt = $conn->prepare("SELECT * FROM users WHERE UserName = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['Password'])) {
                    echo "Login successful!";
                    // Set session variables here
                    session_start();
                    $_SESSION['username'] = $user['UserName'];
                    $_SESSION['fullname'] = $user['FullName'];
                } else {
                    echo "Invalid username or password.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>
