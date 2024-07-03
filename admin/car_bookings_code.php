<?php
include("security.php");
$connection = mysqli_connect("localhost", "root", "", "car_users");

if(isset($_POST['bupdatebtn'])){
    $username = $_POST['edit_username'];
    $title = $_POST['edit_title'];
    $price = $_POST['edit_price'];
    $license_number = $_POST['edit_license_number'];
    $booking_type = $_POST['edit_booking_type'];
    $pickup = $_POST['edit_pickup'];
    $dropoff = $_POST['edit_dropoff'];
    $pickup_date = $_POST['edit_pickup_date'];
    $pickup_time = $_POST['edit_pickup_time'];
    $return_date = $_POST['edit_return_date'];
    $airport_type = $_POST['edit_airport_type'];
    $booking_status = $_POST['edit_booking_status'];

    $query = "UPDATE car_details cd
              JOIN cars c ON cd.car_id = c.car_id
              JOIN bookings b ON cd.detail_id = b.car_details_id
              SET cd.title = '$title',
                  cd.price = '$price',
                  c.license_number = '$license_number',
                  b.booking_type = '$booking_type',
                  b.pickup = '$pickup',
                  b.dropoff = '$dropoff',
                  b.pickup_date = '$pickup_date',
                  b.pickup_time = '$pickup_time',
                  b.return_date = '$return_date',
                  b.airport_type = '$airport_type',
                  b.booking_status = '$booking_status'
              WHERE cd.username = '$username'";
    
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Booking data is updated";
        header('Location: car_bookings.php');
    } else {
        $_SESSION['status'] = "Booking data is not updated";
        header('Location: car_bookings.php');
    }
}

if(isset($_POST['bdelete_btn'])){
    $username = $_POST['delete_bookingid'];

    $query = "DELETE cd, c, b
              FROM car_details cd
              JOIN cars c ON cd.car_id = c.car_id
              JOIN bookings b ON cd.detail_id = b.car_details_id
              WHERE cd.username = '$username'";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Booking data is deleted";
        header('Location: car_bookings.php'); 
    } else {
        $_SESSION['status'] = "Booking data is not deleted";
        header('Location: car_bookings.php'); 
    }    
}
?>
