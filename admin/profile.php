<?php
include("security.php");
include('includes/header.php');
include('includes/navbar.php');
?>


<?php
ob_start();
include('dbconfig.php');

// Fetch user details from the database
$admin_username = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : '';
if (empty($admin_username)) {
    echo "User not found.";
    exit();
}

$stmt = $connection->prepare("SELECT id, admin_username, email, phone, profile_photo FROM admin_register WHERE admin_username = ?");
$stmt->bind_param("s", $admin_username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    // Handle the case where the user is not found
    echo "User not found.";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['admin_username'];
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
    $stmt = $connection->prepare("UPDATE admin_register SET admin_username = ?, email = ?, phone = ?, profile_photo = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $admin_username, $email, $phone, $profile_photo, $user['id']);
    $stmt->execute();

    // Update session variables
    $_SESSION['profile_photo'] = $profile_photo;

    // Redirect to avoid resubmission and refresh data
    header("Location: profile.php");
    exit();
    ob_end_flush();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <style>
        .details .recentOrders {
            position: relative;
            display: grid;
            min-height: 500px;
            background: var(--white);
            padding: 20px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            max-width: 1200px;
            width: 1000px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .profile-photo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-photo-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        #changePhotoButton {
            background-color: #007bff;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            display: none;
        }

        #changePhotoButton:hover {
            background-color: #007cff;
        }

        input[readonly] {
            background-color: #f0f0f0;
        }

        input:not([readonly]) {
            background-color: #ffffff;
        }

        .phone-container {
            display: flex;
            align-items: center;
        }

        .country-code {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="tel"] {
            border-radius: 0 4px 4px 0;
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Profile Settings</h2>
            </div>
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="profile-photo-container">
                        <img src="<?php echo htmlspecialchars($user['profile_photo']); ?>" alt="Profile Photo">
                        <button type="button" id="changePhotoButton">Change Photo</button>
                    </div>
                    <input type="file" id="profile_photo" name="profile_photo" style="display: none;">
                </div>
                <div class="form-group">
                    <label for="admin_username">Username:</label>
                    <input type="text" id="admin_username" name="admin_username" value="<?php echo htmlspecialchars($user['admin_username']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <div class="phone-container">
                        <span class="country-code">+91</span>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
                    </div>
                </div>
                <button type="button" id="editButton">Edit</button>
                <button type="submit" id="saveButton" style="display: none;">Save and Continue</button>
            </form>
        </div>
    </div>

    <script>
        const editButton = document.getElementById('editButton');
        const saveButton = document.getElementById('saveButton');
        const changePhotoButton = document.getElementById('changePhotoButton');
        const profilePhotoInput = document.getElementById('profile_photo');
        const formFields = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"]');

        editButton.addEventListener('click', () => {
            formFields.forEach(field => {
                field.readOnly = false;
                field.style.backgroundColor = '#ffffff'; // Change background color to white
            });
            editButton.style.display = 'none';
            saveButton.style.display = 'block';
            changePhotoButton.style.display = 'block';
        });

        changePhotoButton.addEventListener('click', () => {
            profilePhotoInput.click();
        });
    </script>
</body>

</html>
