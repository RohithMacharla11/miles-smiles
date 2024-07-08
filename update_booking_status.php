<?php
include('config.php');
session_start();

if (!isset($_SESSION['username'])) {
    echo "User not logged in.";
    exit;
}

$currentUsername = $_SESSION['username'];

$stmt = $conn->prepare("UPDATE bookings SET booking_status = 'not_booked' WHERE UserName = :username ORDER BY created_time DESC LIMIT 1");
$stmt->bindParam(':username', $currentUsername);
if ($stmt->execute()) {
    echo "Booking status updated.";
} else {
    echo "Failed to update booking status.";
}
?>
