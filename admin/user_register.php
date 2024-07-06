<?php
include("security.php");
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="user_code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label> FullName </label>
            <input type="text" name="fullname" class="form-control" placeholder="Enter FullName">
          </div>
          <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" pattern="[0-9]{10}" maxlength="10" placeholder="Phone number">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="uregisterbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User Profile
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add User Profile
        </button>
      </h6>
    </div>
    <div class="card-body">
    <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h3 style="color:green"> ' .$_SESSION['success']. ' </h2>';
        unset($_SESSION['success']);
      }

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h3 style="color:red"> ' .$_SESSION['status']. ' </h3>';
        unset($_SESSION['status']);
      }
      ?>
      <div class="table-responsive">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "car_users");
        $query = "SELECT * FROM users";
        $query_run = mysqli_query($connection, $query);
        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> FullName </th>
              <th> Username </th>
              <th>Email </th>
              <th>Phone </th>
              <th>Change Password</th>
              <th>EDIT</th>
              <!-- <th>DELETE</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                  <td><?php echo $row['FullName']; ?></td>
                  <td><?php echo $row['UserName']; ?></td>
                  <td><?php echo $row['EMail']; ?></td>
                  <td><?php echo $row['Phone']; ?></td>
                  <td>
                    <form action="user_register_cp_edit.php" method="post">
                      <input type="hidden" name="ucpedit_username" value="<?php echo $row['UserName']; ?>">
                      <button type="submit" name="ucpedit_btn" class="btn btn-success"> Change</button>
                    </form>
                  </td>
                  <td>
                    <form action="user_register_edit.php" method="post">
                      <input type="hidden" name="edit_username" value="<?php echo $row['UserName']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                  </td>
                  <!-- <td>
                    <form action="user_code.php" method="post" onsubmit="return confirmDelete()">
                      <input type="hidden" name="delete_username" value="<?php echo $row['UserName']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td> -->
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

<!-- <script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this user?");
}
</script> -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
