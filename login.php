<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $hashed_password = $result['password']; // Stored hashed password in database
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Store username in session
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit();
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "User not found";
    }
}
?>
