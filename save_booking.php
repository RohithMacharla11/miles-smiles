<?php
include('config.php');
session_start(); // Start session if not already started

// CAR DETAILS STORING IN car_details TABLE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rent_now'])) {

    // Retrieve car details from POST data
    $carId = $_POST['car_id'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $images = $_POST['images'];
    $username = $_SESSION['username']; // Retrieve username from session

    try {
        // Begin a transaction
        $conn->beginTransaction();

        // Insert into car_details table
        $stmt = $conn->prepare("INSERT INTO car_details (car_id, title, year, price, details, images, username, booking_date) 
                                VALUES (:car_id, :title, :year, :price, :details, :images, :username, NOW())");
        $stmt->bindParam(':car_id', $carId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':details', $details);
        $stmt->bindParam(':images', $images);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Get the last inserted ID from the car_details table
        $detail_id = $conn->lastInsertId();

        // Update booking_status and car_details_id in bookings table
        $updateStmt = $conn->prepare("UPDATE bookings SET booking_status = 'booked', car_details_id = :detail_id WHERE UserName = :username AND booking_status = 'not_booked' ORDER BY created_time DESC LIMIT 1");
        $updateStmt->bindParam(':detail_id', $detail_id);
        $updateStmt->bindParam(':username', $username);
        $updateStmt->execute();

        // Commit the transaction
        $conn->commit();

        header("Location: booking_confirm.php"); // Redirect to profile page after successful booking
        exit();
    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>
