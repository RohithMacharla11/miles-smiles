<?php
include('config.php');
session_start();

if (!isset($_SESSION['username'])) {
    echo "User not logged in.";
    exit;
}

$currentUsername = $_SESSION['username'];
$days = $_POST['days'];
$totalAmount = $_POST['totalAmount'];

// Update the car_details table with the new values
$stmt = $conn->prepare("
    UPDATE car_details
    SET no_of_days = :days, total_amount = :totalAmount
    WHERE username = :username
    ORDER BY booking_date DESC, detail_id DESC
    LIMIT 1
");
$stmt->bindParam(':username', $currentUsername);
$stmt->bindParam(':days', $days);
$stmt->bindParam(':totalAmount', $totalAmount);

if ($stmt->execute()) {
    echo "Car details updated successfully";
} else {
    echo "Failed to update car details";
}
?>
