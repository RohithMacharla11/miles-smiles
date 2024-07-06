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
<style>
    .profile-photo {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        vertical-align: middle;
    }

    .dropdown {
        display: inline-block;
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .username {
        margin-right: 10px;
        vertical-align: middle;
    }
</style>

<body>
    <header>
        <nav>
            <a id="hero" href="home.php" class="logo">Car Hire</a>
            <div class="navbar">
                <a href="home.php">Home</a>
                <a href="cars.php">Cars</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
                <a href="FAQs.php">FAQs</a>
                <?php if (isset($_SESSION['username'])) : ?>
                    <div class="dropdown">
                        <?php
                        require "config.php";
                        $username = $_SESSION['username'];
                        $stmt = $conn->prepare("SELECT profile_photo FROM users WHERE username = :username");
                        $stmt->bindParam(':username', $username);
                        $stmt->execute();
                        $user = $stmt->fetch(PDO::FETCH_ASSOC); 
                        $profile_photo = $user['profile_photo'];
                         if (isset($profile_photo) && !empty($profile_photo)) : ?>
                            <img src="<?php echo htmlspecialchars($profile_photo); ?>" alt="Profile Photo" class="profile-photo">

                        <?php else : ?>
                            <img src="css/images/th.jpg" class="profile-photo">
                        <?php endif; ?>
                        <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        <a href="#">

                        </a>
                        <div class="dropdown-content">
                            <a href="profilesettings.php">Profile</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="signin.php">Sign In</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
</body>

</html>