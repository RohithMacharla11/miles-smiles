0 * * * * php /path/to/delete_not_booked_bookings.php


try {
    // Calculate the timestamp 3 hours ago
    $threeHoursAgo = date('Y-m-d H:i:s', strtotime('-3 hours'));

    // Prepare and execute the SQL delete query
    $stmt = $conn->prepare("DELETE FROM booking WHERE booking_status = 'not_booked' AND created_at <= :three_hours_ago");
    $stmt->bindParam(':three_hours_ago', $threeHoursAgo);
    $stmt->execute();

    echo "Deleted expired bookings successfully.";
} catch (PDOException $e) {
    echo "Error deleting expired bookings: " . $e->getMessage();
}