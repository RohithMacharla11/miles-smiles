<?php 
include('header.php'); 
echo "Thanks for the booking";
?>
<?php
include('config.php');
session_start();

// Assuming you have a way to get the current logged-in user's username
$currentUsername = $_SESSION['username'];

// Fetch user details
$stmt = $conn->prepare("SELECT FullName, Phone, EMail FROM users WHERE UserName = :username");
$stmt->bindParam(':username', $currentUsername);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch the latest booking details
$stmt = $conn->prepare("SELECT * FROM bookings WHERE UserName = :username ORDER BY created_time DESC LIMIT 1");
$stmt->bindParam(':username', $currentUsername);
$stmt->execute();
$booking = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch the most recent car booking details for the user
$stmt = $conn->prepare("
    SELECT cd.*, c.title, c.price, c.details AS car_details 
    FROM car_details cd
    JOIN cars c ON cd.car_id = c.car_id
    WHERE cd.username = :username
    ORDER BY cd.booking_date DESC, cd.id DESC
    LIMIT 1
");
$stmt->bindParam(':username', $currentUsername);
$stmt->execute();
$carDetails = $stmt->fetch(PDO::FETCH_ASSOC);

// Pass the data to JavaScript
echo '<script>';
echo 'var user = ' . json_encode($user) . ';';
echo 'var booking = ' . json_encode($booking) . ';';
echo 'var car = ' . json_encode($carDetails) . ';';
echo '</script>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
    <button class="btn" id="rent-btn">Rent now</button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rentNowButton = document.getElementById('rent-btn');
            rentNowButton.addEventListener('click', redirectToWhatsApp);
        });

        function redirectToWhatsApp() {
            // Construct the WhatsApp message
            const fullName = user.FullName;
            const phone = user.Phone;
            const email = user.EMail;
            const bookingType = booking.booking_type;
            const pickup = booking.pickup;
            const dropoff = booking.dropoff;
            const pickupDate = booking.pickup_date;
            const pickupTime = booking.pickup_time;
            const returnDate = booking.return_date;
            const airportType = booking.airport_type;
            const carName = car.title;
            const carPrice = car.price;
            const carDetails = car.car_details;

            let message = `Thank You for renting a car\nName: ${fullName}\nPhone no: ${phone}\nEmail: ${email}\nBooking Details:\n`;
            if (airportType) message += `AIRPORT TYPE: ${airportType}\n`;
            message += `Pickup: ${pickup}\nDropoff: ${dropoff}\nPickup Date: ${pickupDate}\nPickup Time: ${pickupTime}\n`;
            if (returnDate) message += `Return Date: ${returnDate}\n`;
            message += `Car Details:\nCar Name: ${carName}\nCar Price: ${carPrice}\nCar Details: ${carDetails}`;

            // Encode the message for use in a URL
            const encodedMessage = encodeURIComponent(message);

            // Construct the WhatsApp URL
            const whatsappURL = `https://wa.me/917989481578?text=${encodedMessage}`;

            // Open WhatsApp in a new tab
            const whatsappWindow = window.open(whatsappURL, '_blank');

            // Redirect current tab to home.php
            if (whatsappWindow) {
                // Close the current tab after 2 seconds (adjust as needed)
                setTimeout(function() {
                    window.location.href = 'home.php';
                }, 2000); // Redirect after 2 seconds
            } else {
                // Handle if the pop-up blocker prevents opening the new tab
                alert('Please allow pop-ups to open WhatsApp.');
                window.location.href = 'home.php'; // Redirect immediately if new tab fails to open
            }
        }
    </script>
</body>
</html>
