<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </div>

        <div class="card-body">
            <?php
            if (isset($_POST['cpedit_btn'])) {
                $connection = mysqli_connect("localhost", "root", "", "car_users");
                $id = $_POST['cpedit_id'];
                $query = "SELECT * FROM admin_register WHERE id = '$id'";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>
                    <form action="cp_code.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="edit_old_password" class="form-control" placeholder="Enter Old Password">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="edit_new_password" class="form-control" placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="edit_con_password" class="form-control" placeholder="Re-Enter New Password">
                        </div>
                        <a href="register.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
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