<?php
// db.php - Ensure you have a proper database connection file
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    echo "User not logged in.";
    exit;
}

$username = $_SESSION['username']; // Retrieve from session

// Fetch data from car_details table
$carDetailsQuery = $pdo->prepare("SELECT * FROM car_details WHERE username = :username ORDER BY booking_date DESC LIMIT 1");
$carDetailsQuery->bindParam(':username', $username);
$carDetailsQuery->execute();
$carDetails = $carDetailsQuery->fetch(PDO::FETCH_ASSOC);

if ($carDetails) {
    $detail_id = $carDetails['detail_id'];

    // Fetch data from bookings table
    $bookingsQuery = $pdo->prepare("SELECT * FROM bookings WHERE car_details_id = :detail_id ORDER BY created_at DESC LIMIT 1");
    $bookingsQuery->execute(['detail_id' => $detail_id]);
    $booking = $bookingsQuery->fetch(PDO::FETCH_ASSOC);

    if ($booking) {
        $carName = $carDetails['title'];
        $bookingDate = $carDetails['booking_date'];
        $pickupLocation = $booking['pickup'];
        $pickupDate = $booking['pickup_date'];
        $pickupTime = $booking['pickup_time'];
        $pricePerDay = $carDetails['price'];
    } else {
        // Handle case where booking details are not found
        echo "Booking details not found.";
        exit;
    }
} else {
    // Handle case where car details are not found
    echo "Car details not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="css/cb.css">
</head>

<body>
    <div id="wrapper">
        <div class="card">
            <div class="icon">
            </div>
            <h1>
                Your car is ready to book!
            </h1>
            <p>
                Contact our team through WhatsApp for Booking Confirmation.
            </p>
        </div>
        <div class="card">
            <ul>
                <li>
                    <span>Car Name</span>
                    <span id="carName"><?php echo htmlspecialchars($carName); ?></span>
                </li>
                <li>
                    <span>Booking Date</span>
                    <span id="bookingDate"><?php echo htmlspecialchars($bookingDate); ?></span>
                </li>
                <li>
                    <span>Pickup Location</span>
                    <span id="pickupLocation"><?php echo htmlspecialchars($pickupLocation); ?></span>
                </li>
                <li>
                    <span>Pickup Date</span>
                    <span id="pickupDate"><?php echo htmlspecialchars($pickupDate); ?></span>
                </li>
                <li>
                    <span>Pickup Time</span>
                    <span id="pickupTime"><?php echo htmlspecialchars($pickupTime); ?></span>
                </li>
                <li>
                    <span>No. of Days</span>
                    <span>
                        <button onclick="decrementDays()">-</button>
                        <input type="number" id="days" value="1" min="1" oninput="updateTotalAmount()">
                        <button onclick="incrementDays()">+</button>
                    </span>
                </li>
                <li>
                    <span>Total Amount</span>
                    <span id="totalAmount">$<?php echo htmlspecialchars($pricePerDay); ?></span>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="cta-row">
                <button class="secondary">
                    Back to dashboard
                </button>
                <button>
                    Explore use cases
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fetch initial data from PHP
            const pricePerDay = <?php echo $pricePerDay; ?>;
            document.getElementById("days").setAttribute("data-price", pricePerDay);
            updateTotalAmount();
        });

        function updateTotalAmount() {
            const days = parseInt(document.getElementById("days").value);
            const pricePerDay = parseInt(document.getElementById("days").getAttribute("data-price"));
            const totalAmount = days * pricePerDay;
            document.getElementById("totalAmount").textContent = `$${totalAmount}`;
        }

        function incrementDays() {
            const daysInput = document.getElementById("days");
            let days = parseInt(daysInput.value);
            daysInput.value = ++days;
            updateTotalAmount();
        }

        function decrementDays() {
            const daysInput = document.getElementById("days");
            let days = parseInt(daysInput.value);
            if (days > 1) {
                daysInput.value = --days;
                updateTotalAmount();
            }
        }
    </script>
</body>

</html>
