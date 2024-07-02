<!-- /includes/header.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>My Website</title>
</head>
<body>
    <header>
        <nav>
        <a href="home.php" class="logo">Car Hire</a>
            <div class="navbar">
            <a href="home.php">Home</a>
                 <a href="about.php">About</a>
                <a href="contact.php">Contact</a> 
                <a href="FAQs.php">FAQs</a>
            <?php if (isset($_SESSION['username'])): ?>
                <div class="dropdown">
                   <a href="#">Hi, <?php echo $_SESSION['username']; ?></a> 
                    <div class="dropdown-content">
                       <a href="profile.php">Profile</a> 
                          <a href="logout.php">Logout</a> 
                    </div>
                </div>
                
            <?php else: ?>
                      <a href="signin.php">Sign In</a> 
            <?php endif; ?>
            </div>
        </nav>
         
    </header>
