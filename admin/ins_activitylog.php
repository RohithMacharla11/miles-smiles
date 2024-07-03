<?php
require 'dbconfig.php';

// Function to insert a new activity log entry
function insertActivityLog($connection, $user_id, $activity, $description) {
    // Prepare the SQL statement
    $stmt = $connection->prepare("INSERT INTO activity_log (user_id, activity, description, timestamp) VALUES (?, ?, ?, NOW())");
    
    // Bind the parameters
    $stmt->bind_param("iss", $user_id, $activity, $description);
    
    // Execute the statement
    $stmt->execute();
    
    // Close the statement
    $stmt->close();
}

// Example usage
$user_id = 1; // Replace with the actual user ID
$activity = "login"; // Replace with the actual activity
$description = "User logged in"; // Replace with the actual description

// Insert the log entry
insertActivityLog($connection, $user_id, $activity, $description);

// Close the database connection
$connection->close();
?>
