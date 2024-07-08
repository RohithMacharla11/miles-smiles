<?php
include("security.php");
$connection = mysqli_connect("localhost", "root", "", "car_users");

if (isset($_POST['cregisterbtn'])) {
    $carname = $_POST['carname'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $images = $_POST['images'];
    $license_number = $_POST['license_number'];
    $owner_name = $_POST['owner_name'];
    $car_status = $_POST['car_status'];

    // JSON-encode the details and images arrays
    $details_json = json_encode($details);
    $images_json = json_encode($images);

    $query = "INSERT INTO cars (title, year, price, details, images, license_number, car_owner, car_status) VALUES ('$carname', '$year', '$price', '$details_json', '$images_json', '$license_number', '$owner_name', '$car_status')";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo "Saved";
        $_SESSION['success'] = "Car Added";
        header('Location: active_cars.php');
    } else {
        echo "Not Saved";
        $_SESSION['status'] = "Car Not Added";
        header('Location: active_cars.php');
    }
}
if (isset($_POST['cupdatebtn'])) {
    $connection = mysqli_connect("localhost", "root", "", "car_users");

    $car_id = $_POST['edit_carid'];
    $car_name = $_POST['edit_carname'];
    $year = $_POST['edit_year'];
    $price = $_POST['edit_price'];
    $license_number = $_POST['edit_license_number'];
    $owner_name = $_POST['edit_owner_name'];
    $car_status = $_POST['edit_car_status'];

    // Encode details and images arrays to JSON
    $details = json_encode($_POST['edit_details']);
    $images = json_encode($_POST['edit_images']);

    $query = "UPDATE cars SET title='$car_name', year='$year', price='$price', license_number='$license_number', car_owner='$owner_name', car_status='$car_status', details='$details', images='$images' WHERE car_id='$car_id'";
    
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Car Profile Updated";
        header('Location: active_cars.php');
    } else {
        $_SESSION['status'] = "Car Profile Not Updated";
        header('Location: active_cars.php');
    }
}

if(isset($_POST['cdelete_btn']))
{
    $id = $_POST['delete_carid'];

    $query = "DELETE FROM cars WHERE car_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "User Data is Deleted";
        header('Location: active_cars.php'); 
    }
    else
    {
        $_SESSION['status'] = "User Data is NOT DELETED";
        header('Location: active_cars.php'); 
    }    
}

?>