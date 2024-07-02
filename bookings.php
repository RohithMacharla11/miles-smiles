<?php
session_start();
include("config.php");
//BOOKING DETAILS(HOMEPAGE) STORING IN bookings TABLE
if (!isset($_SESSION['username'])) {
    // Store form data in session variables
    $_SESSION['booking_type'] = $_POST['booking_type'];
    $_SESSION['pickup'] = $_POST['pickup'];
    $_SESSION['dropoff'] = $_POST['dropoff'];
    $_SESSION['pickup_date'] = $_POST['pickup_date'];
    $_SESSION['return_date'] = isset($_POST['return_date']) ? $_POST['return_date'] : null;
    $_SESSION['pickup_time'] = $_POST['pickup_time'];
    $_SESSION['airport_type'] = isset($_POST['airport_type']) ? $_POST['airport_type'] : null;

    // Redirect to sign-in page
    header('Location: signin.php');
    exit;
}
$id = $_POST['id'];
$booking_type = $_POST['booking_type'];
$pickup = $_POST['pickup'];
$dropoff = $_POST['dropoff'];
$pickup_date = $_POST['pickup_date'];
$return_date = isset($_POST['return_date']) ? $_POST['return_date'] : null;
$pickup_time = $_POST['pickup_time'];
$airport_type = isset($_POST['airport_type']) ? $_POST['airport_type'] : null;
$username = $_SESSION['username']; // Assuming you're passing the username from the form

$sql = "INSERT INTO bookings (booking_type, pickup, dropoff, pickup_date, return_date, pickup_time, airport_type, UserName)
        VALUES (:booking_type, :pickup, :dropoff, :pickup_date, :return_date, :pickup_time, :airport_type, :username)";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':booking_type', $booking_type);
    $stmt->bindParam(':pickup', $pickup);
    $stmt->bindParam(':dropoff', $dropoff);
    $stmt->bindParam(':pickup_date', $pickup_date);
    $stmt->bindParam(':return_date', $return_date);
    $stmt->bindParam(':pickup_time', $pickup_time);
    $stmt->bindParam(':airport_type', $airport_type);
    $stmt->bindParam(':username', $username);

    $stmt->execute();
    header('Location: services.php');
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

$conn = null; // Close the PDO connection properly
?>
