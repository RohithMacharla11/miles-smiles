<?php
include("security.php");
$connection = mysqli_connect("localhost", "root", "", "car_users");

if (isset($_POST['registerbtn'])) {
    $admin_username = $_POST['admin_username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if ($password === $cpassword) {
        $query = "INSERT INTO admin_register (admin_username,email,phone,password) VALUES ('$admin_username','$email', '$phone','$password')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            echo "Saved";
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
        } else {
            echo "Not Saved";
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: register.php');
        }
    } else {
        $_SESSION = "Password and Confirm Password Doesnot match";
        header('Location: register.php');
    }
}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $admin_username = $_POST['edit_admin_username'];
    $email = $_POST['edit_email'];
    $phone = $_POST['edit_phone'];
    $password = $_POST['edit_password'];

    $query = "UPDATE admin_register SET admin_username = '$admin_username', email = '$email',phone = '$phone',password = '$password' where id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "YOUR DATA IS UPDATED";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "YOUR DATA IS NOT UPDATED";
        header('Location: register.php');
    }
}

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin_register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: register.php');
    }
}



if (isset($_POST['login_btn'])) {
    $admin_username_login = $_POST['admin_username'];
    $password_login = $_POST['password'];

    $query = "SELECT * FRoM admin_register where admin_username = '$admin_username_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run)) {
        $_SESSION['admin_username'] = $admin_username_login;
        require 'dbconfig.php';

        // Function to insert a new activity log entry
        function insertActivityLog($connection, $admin_username_login, $activity, $description)
        {
            $stmt = $connection->prepare("INSERT INTO activity_log (username, activity, description, timestamp) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("sss", $admin_username_login, $activity, $description);
            $stmt->execute();
            $stmt->close();
        }

        $activity = "login";
        $description = "Admin logged in";

        insertActivityLog($connection, $admin_username_login, $activity, $description);

        // Close the database connection
        $connection->close();
        header('Location: index.php');
    } else {
        $_SESSION['status'] = 'Email id /Password is Invalid';
        header('Location: login.php');
    }
}
