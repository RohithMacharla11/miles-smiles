<?php
session_start();
include('config.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
    exit();
}

// Fetch user details from the database
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT fullname, username, email, phone, profile_photo FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $profile_photo = $user['profile_photo'];

    // Handle profile photo upload
    if (!empty($_FILES['profile_photo']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['profile_photo']['name']);
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], $target_file);
        $profile_photo = $target_file;
    }

    // Update user details in the database
    $stmt = $conn->prepare("UPDATE users SET fullname = :fullname, email = :email, phone = :phone, profile_photo = :profile_photo WHERE username = :username");
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':profile_photo', $profile_photo);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Update session variables
    $_SESSION['profile_photo'] = $profile_photo;

    echo "Profile updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="css/user.css">
    <style>
        /* Additional styles for profile photo container */
        .profile-photo-container {
            display: flex;
            align-items: center;
        }

        .profile-photo-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-photo-container button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    
<?php include('navigation.php');?>
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Profile Settings</h2>
                    </div>
                    <form action="profilesettings.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="profile_photo">Profile Photo:</label>
                            <div class="profile-photo-container">
                                <img src="<?php echo htmlspecialchars($user['profile_photo']); ?>" alt="Profile Photo">
                                <button type="button" id="changePhotoButton">Change Photo</button>
                            </div>
                            <input type="file" id="profile_photo" name="profile_photo" style="display: none;">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
                        </div>
                      
                        <button type="button" id="editButton">Edit</button>
                        <button type="submit" id="saveButton" style="display: none;">Save and Continue</button>
                    </form>
                    <a href="home.php">Back to Home</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const editButton = document.getElementById('editButton');
        const saveButton = document.getElementById('saveButton');
        const changePhotoButton = document.getElementById('changePhotoButton');
        const profilePhotoInput = document.getElementById('profile_photo');
        const formFields = document.querySelectorAll('input[type="text"], input[type="email"], input[type="file"]');

        editButton.addEventListener('click', () => {
            formFields.forEach(field => {
                field.readOnly = false;
                if (field.type === 'file') {
                    field.disabled = false;
                }
            });
            editButton.style.display = 'none';
            saveButton.style.display = 'block';
        });

        changePhotoButton.addEventListener('click', () => {
            profilePhotoInput.click();
        });
    </script>
</body>

</html>
