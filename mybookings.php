<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

include('config.php');

$username = $_SESSION['username'];

try {
    // Query to get bookings for the logged-in user with status 'booked'
    $stmt = $conn->prepare("
        SELECT 
            b.UserName, 
            b.booking_type, 
            b.pickup, 
            b.dropoff, 
            b.pickup_date, 
            b.return_date, 
            b.pickup_time, 
            b.airport_type,
            c.title,
            c.price,
            c.booking_date
        FROM bookings b
        JOIN car_details c ON b.car_details_id = c.detail_id
        WHERE b.UserName = :username AND b.booking_status = 'booked'
    ");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/8954b3c36f.js" crossorigin="anonymous"></script>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/mybookings.css">
</head>

<body>
    <!-- =============== Navigation ================ -->

    <?php include('navigation.php'); ?>
    
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders" id="recentOrders">
            <div class="cardHeader">
                <h2>Recent Orders</h2>
                <a href="#" class="btn" id="viewAllBtn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Type</td>
                        <td>Pickup</td>
                        <td>Dropoff</td>
                        <td>Pickup Date</td>
                        <td>Return Date</td>
                        <td>Pickup Time</td>
                        <td>Airport Type</td>
                        <td>Title</td>
                        <td>Price</td>
                        <td>Booking Date</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $index => $order): ?>
                            <tr class="orderRow <?php echo $index >= 10 ? 'hidden' : ''; ?>">
                                <td><?php echo htmlspecialchars($order['UserName']); ?></td>
                                <td><?php echo htmlspecialchars($order['booking_type']); ?></td>
                                <td><?php echo htmlspecialchars($order['pickup']); ?></td>
                                <td><?php echo htmlspecialchars($order['dropoff']); ?></td>
                                <td><?php echo htmlspecialchars($order['pickup_date']); ?></td>
                                <td><?php echo htmlspecialchars($order['return_date']); ?></td>
                                <td><?php echo htmlspecialchars($order['pickup_time']); ?></td>
                                <td><?php echo htmlspecialchars($order['airport_type']) ?: '-'; ?></td>
                                <td><?php echo htmlspecialchars($order['title']); ?></td>
                                <td><?php echo htmlspecialchars($order['price']); ?></td>
                                <td><?php echo htmlspecialchars($order['booking_date']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11">No orders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <!-- =========== Scripts =========  -->
    <script src="js/main.js"></script>
    <script>
        document.getElementById('viewAllBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.orderRow.hidden').forEach(function(row) {
                row.classList.remove('hidden');
            });
            this.style.display = 'none';
        });
    </script>
</body>
</html>
