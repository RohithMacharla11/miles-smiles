<?php
include("security.php");
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary">Car Bookings</h3>
    </div>


    <div class="card-body">

      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        //echo '<h2 class="bg-primary> ' .$_SESSION['success']. ' </h2>';
        unset($_SESSION['success']);
      }

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        //echo '<h2 class="bg-danger"> ' .$_SESSION['status']. ' </h2>';
        unset($_SESSION['status']);
      }
      ?>
      <div class="table-responsive">

      <?php
$connection = mysqli_connect("localhost", "root", "", "car_users");

$query = "SELECT cd.username, cd.title, cd.price, c.license_number, b.booking_type, b.pickup, b.dropoff, b.pickup_date, b.pickup_time, b.return_date, b.airport_type, b.booking_status 
          FROM car_details cd 
          JOIN cars c ON cd.car_id = c.car_id
          JOIN bookings b ON cd.detail_id = b.car_details_id";

$query_run = mysqli_query($connection, $query);
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>User Name</th>
      <th>Car Title</th>
      <th>Price</th>
      <th>License Number</th>
      <th>Booking Type</th>
      <th>Pickup Location</th>
      <th>Dropoff Location</th>
      <th>Pickup Date</th>
      <th>Pickup Time</th>
      <th>Return Date</th>
      <th>Airport Type</th>
      <th>Booking Status</th>
      <th>EDIT</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (mysqli_num_rows($query_run) > 0) {
      while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
        <tr>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['license_number']; ?></td>
          <td><?php echo $row['booking_type']; ?></td>
          <td><?php echo $row['pickup']; ?></td>
          <td><?php echo $row['dropoff']; ?></td>
          <td><?php echo $row['pickup_date']; ?></td>
          <td><?php echo $row['pickup_time']; ?></td>
          <td><?php echo $row['return_date']; ?></td>
          <td><?php echo $row['airport_type']; ?></td>
          <td><?php echo $row['booking_status']; ?></td>
          <td>
            <form action="car_bookings_edit.php" method="post">
              <input type="hidden" name="edit_bookingid" value="<?php echo $row['username']; ?>">
              <button type="submit" name="bedit_btn" class="btn btn-success">EDIT</button>
            </form>
          </td>
        </tr>
    <?php
      }
    } else {
      echo "<tr><td colspan='14'>No Record Found</td></tr>";
    }
    ?>
  </tbody>
</table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<script>
    function addDetail() {
        var detailsGroup = document.getElementById('details-group');
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'details[]';
        input.className = 'form-control';
        input.placeholder = 'Enter Detail';
        detailsGroup.appendChild(input);
    }

    function addImage() {
        var imagesGroup = document.getElementById('images-group');
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'images[]';
        input.className = 'form-control';
        input.placeholder = 'Enter Image URL';
        imagesGroup.appendChild(input);
    }
</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>