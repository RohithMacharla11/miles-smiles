<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>


        <div class="card-body">

            <?php if (isset($_POST['edit_btn'])) {
                $connection = mysqli_connect("localhost", "root", "", "car_users");
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM admin_register WHERE id = '$id'";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="code.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label> admin_username </label>
                            <input type="text" name="edit_admin_username" value="<?php echo $row['admin_username'] ?>" class="form-control" placeholder="Enter admin_username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" name="edit_phone" pattern="[0-9]{10}" maxlength="10" class="form-control" placeholder="Enter Phone Number" value="<?php echo htmlspecialchars($row['phone']); ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
                        </div>
                        <a href="register.php" class="btn btn-danger"> CANCEL</a>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Update</button>
                    </form>
            <?php
                }
            }
            ?>

            <?php
            include('includes/scripts.php');
            include('includes/footer.php');
            ?>