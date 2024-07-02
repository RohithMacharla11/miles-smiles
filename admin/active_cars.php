<?php
include("security.php");
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New CAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="acar_code.php" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label> Car Name </label>
            <input type="text" name="carname" class="form-control" placeholder="Enter Car Name">
          </div>

          <div class="form-group">
            <label> Year </label>
            <input type="year" name="year" class="form-control" placeholder="Enter Year">
          </div>
          <div class="form-group"> 
            <label>Price</label>
            <input type="number" step =0.001 name="price" class="form-control" placeholder="Enter Price">
          </div>
          <div class="form-group">
            <label>Details</label>
            <div id="details-group">
                <input type="text" name="details[]" class="form-control" placeholder="Enter Detail">
            </div>
            <button type="button" class="btn btn-secondary" onclick="addDetail()">Add More Details</button>
        </div>

        <div class="form-group">
            <label>Images</label>
            <div id="images-group">
                <input type="text" name="images[]" class="form-control" placeholder="Enter Image URL">
            </div>
            <button type="button" class="btn btn-secondary" onclick="addImage()">Add More Images</button>
        </div>
        <div class="form-group">
            <label>License Number</label>
            <input type="text"  name="license_number" class="form-control" placeholder="Enter license_number">
        </div>
        <div class="form-group">
            <label>Owner Name</label>
            <input type="text"  name="owner_name" class="form-control" placeholder="Enter Owner Name">
        </div>
        <div class="form-group">
            <label>Car Status</label>
            <input type="text"  name="car_status" class="form-control" placeholder="Enter car_status">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="cregisterbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Active Cars
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add New Car
        </button>
      </h6>
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
        $query = "SELECT * FROM cars";
        $query_run = mysqli_query($connection, $query);
        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> Car Id </th>
              <th> Car Title </th>
              <th>Year </th>
              <th>Price </th>
              <th>Details</th>
              <th>Images</th>
              <th>License Number</th>
              <th>Owner</th>
              <th>Car_status</th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                <td><?php echo $row['car_id']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['year']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['details']; ?></td>
                  <td><?php echo $row['images']; ?></td>
                  <td><?php echo $row['license_number']; ?></td>
                  <td><?php echo $row['car_owner']; ?></td>
                  <td><?php echo $row['car_status']; ?></td>
                  <td>
                    <form action="act_car_register_edit.php" method="post">
                      <input type="hidden" name="edit_carid" value="<?php echo $row['car_id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="acar_code.php" method="post">
                      <input type="hidden" name="delete_carid" value="<?php echo $row['car_id']; ?>">
                      <button type="submit" name="cdelete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "No Record Found";
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