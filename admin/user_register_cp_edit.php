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
            if (isset($_POST['ucpedit_btn'])) {
                $connection = mysqli_connect("localhost", "root", "", "car_users");
                $username = mysqli_real_escape_string($connection, $_POST['ucpedit_username']);
                $query = "SELECT * FROM users WHERE UserName = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
                    <form action="user_cp_code.php" method="post">
                        <input type="hidden" name="edit_username" value="<?php echo htmlspecialchars($row['UserName']); ?>">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="edit_old_password" class="form-control" placeholder="Enter Old Password" required>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="edit_new_password" class="form-control" placeholder="Enter New Password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="edit_con_password" class="form-control" placeholder="Re-Enter New Password" required>
                        </div>
                        <a href="register.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                    </form>
            <?php
                } else {
                    echo "<div class='alert alert-danger'>User not found.</div>";
                }
                $stmt->close();
                $connection->close();
            }
            ?>
        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>