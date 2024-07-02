<?php
include('config.php');
session_start();
// REGISTERING USER DATA IN users table
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        // Prepare the SQL statement with named parameters
        $stmt = $conn->prepare("INSERT INTO users (FullName, Username, EMail, Phone, Password) VALUES (:fullname, :username, :email, :phone, :password)");
        // Bind the parameters
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Execute the statement
        if ($stmt->execute()) {
            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            // Redirect to the home page
            header('Location: home.php');
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
