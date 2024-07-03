<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Car Booking</h6>
        </div>

        <div class="card-body">
            <?php if (isset($_POST['bedit_btn'])) {
                $connection = mysqli_connect("localhost", "root", "", "car_users");
                $username = $_POST['edit_bookingid'];
                $query = "SELECT cd.username, cd.title, cd.price, c.license_number, b.booking_type, b.pickup, b.dropoff, b.pickup_date, b.pickup_time, b.return_date, b.airport_type, b.booking_status
                          FROM car_details cd 
                          JOIN cars c ON cd.car_id = c.car_id
                          JOIN bookings b ON cd.detail_id = b.car_details_id
                          WHERE cd.username = '$username'";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>
                    <form action="car_bookings_code.php" method="post">
                        <input type="hidden" name="edit_username" value="<?php echo $row['username'] ?>">
                        <div class="form-group">
                            <label>Car Title</label>
                            <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control" placeholder="Enter Car Title">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="edit_price" value="<?php echo $row['price'] ?>" class="form-control" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label>License Number</label>
                            <input type="text" name="edit_license_number" value="<?php echo $row['license_number'] ?>" class="form-control" placeholder="Enter License Number">
                        </div>
                        <div class="form-group">
                            <label>Booking Type</label>
                            <input type="text" name="edit_booking_type" value="<?php echo $row['booking_type'] ?>" class="form-control" placeholder="Enter Booking Type">
                        </div>
                        <div class="form-group">
                            <label>Pickup Location</label>
                            <input type="text" name="edit_pickup" value="<?php echo $row['pickup'] ?>" class="form-control" placeholder="Enter Pickup Location">
                        </div>
                        <div class="form-group">
                            <label>Dropoff Location</label>
                            <input type="text" name="edit_dropoff" value="<?php echo $row['dropoff'] ?>" class="form-control" placeholder="Enter Dropoff Location">
                        </div>
                        <div class="form-group">
                            <label>Pickup Date</label>
                            <input type="date" name="edit_pickup_date" value="<?php echo $row['pickup_date'] ?>" class="form-control" placeholder="Enter Pickup Date">
                        </div>
                        <div class="form-group">
                            <label>Pickup Time</label>
                            <input type="time" name="edit_pickup_time" value="<?php echo $row['pickup_time'] ?>" class="form-control" placeholder="Enter Pickup Time">
                        </div>
                        <div class="form-group">
                            <label>Return Date</label>
                            <input type="date" name="edit_return_date" value="<?php echo $row['return_date'] ?>" class="form-control" placeholder="Enter Return Date">
                        </div>
                        <div class="form-group">
                            <label>Airport Type</label>
                            <input type="text" name="edit_airport_type" value="<?php echo $row['airport_type'] ?>" class="form-control" placeholder="Enter Airport Type">
                        </div>
                        <div class="form-group">
                            <label>Booking Status</label>
                            <input type="text" name="edit_booking_status" value="<?php echo $row['booking_status'] ?>" class="form-control" placeholder="Enter Booking Status">
                        </div>
                        <a href="car_bookings.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="bupdatebtn" class="btn btn-primary">Update</button>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
