<?php

// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }

include('config.php');
session_start();
$username = $_SESSION['username'];

try {
    // Query to get bookings for the logged-in user
    $stmt = $conn->prepare("SELECT UserName, id, booking_type, pickup, dropoff, pickup_date, return_date, pickup_time, airport_type FROM bookings WHERE UserName = :username");
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
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <?php include('header.php'); ?>
    <?php include('navigation.php'); ?>
    
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Orders</h2>
                <a href="#" class="btn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Booking ID</td>
                        <td>Type</td>
                        <td>Pickup</td>
                        <td>Dropoff</td>
                        <td>Pickup Date</td>
                        <td>Return Date</td>
                        <td>Pickup Time</td>
                        <td>Airport Type</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['UserName']); ?></td>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars($order['booking_type']); ?></td>
                                <td><?php echo htmlspecialchars($order['pickup']); ?></td>
                                <td><?php echo htmlspecialchars($order['dropoff']); ?></td>
                                <td><?php echo htmlspecialchars($order['pickup_date']); ?></td>
                                <td><?php echo htmlspecialchars($order['return_date']); ?></td>
                                <td><?php echo htmlspecialchars($order['pickup_time']); ?></td>
                                <td><?php echo htmlspecialchars($order['airport_type']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9">No orders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('footer.php');?>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
</body>
</html>