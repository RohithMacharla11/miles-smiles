<?php
include('config.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
    exit();
}

if (isset($_POST['updatebtn'])) {
    $connection = mysqli_connect("localhost", "root", "", "car_users");

    $username = mysqli_real_escape_string($connection, $_POST['edit_username']);
    $old_password = $_POST['edit_old_password'];
    $new_password = $_POST['edit_new_password'];
    $confirm_password = $_POST['edit_con_password'];

    // Fetch the user data
    $query = "SELECT * FROM users WHERE UserName = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($old_password, $row['Password'])) {
        if ($new_password === $confirm_password) {
            $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);
            $update_query = "UPDATE users SET password=? WHERE UserName=?";
            $update_stmt = $connection->prepare($update_query);
            $update_stmt->bind_param("ss", $hashed_new_password, $username);
            $update_success = $update_stmt->execute();

            if ($update_success) {
                $_SESSION['status'] = "Password Updated Successfully";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "Password Update Failed";
                $_SESSION['status_code'] = "error";
            }
            $update_stmt->close();
        } else {
            $_SESSION['status'] = "New Password and Confirm Password Do Not Match";
            $_SESSION['status_code'] = "warning";
        }
    } else {
        $_SESSION['status'] = "Old Password Does Not Match";
        $_SESSION['status_code'] = "warning";
    }
    $stmt->close();
    $connection->close();

    header('Location: user_register.php');
}
?>
