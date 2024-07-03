<?php
session_start();
require 'dbconfig.php';

if (isset($_POST['logout_btn'])) {
    $user_name = $_SESSION['username']; // Get the username before destroying the session
    
    // Function to insert a new activity log entry
    function insertActivityLog($connection, $user_name, $activity, $description) {
        $stmt = $connection->prepare("INSERT INTO activity_log (username, activity, description, timestamp) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $user_name, $activity, $description); // Correct binding type for username
        $stmt->execute();
        $stmt->close();
    }
    
    $activity = "admin logout"; 
    $description = "admin logged out";
    
    insertActivityLog($connection, $user_name, $activity, $description);
    
    // Close the database connection
    $connection->close();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page
    header('Location: login.php');
    exit(); // Ensure no further code is executed
}
?>
