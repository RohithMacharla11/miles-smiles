<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User Profile</h6>
        </div>


        <div class="card-body">

            <?php if (isset($_POST['edit_btn'])) {
                $connection = mysqli_connect("localhost", "root", "", "car_users");
                $username = $_POST['edit_username'];
                $query = "SELECT * FROM users WHERE username = '$username'";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="user_code.php" method="post">
                        <label> Full Name </label><br>
                        <input type="text" name="edit_fullname" value="<?php echo $row['FullName'] ?>">
                        <div class="form-group">

                            <input type="hidden" name="edit_username" value="<?php echo $row['UserName'] ?>" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $row['EMail'] ?>" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" name="edit_phone" pattern="[0-9]{10}" maxlength="10" value="<?php echo $row['Phone'] ?>" class="form-control" placeholder="Enter Phone Number">
                        </div>
                        <!-- <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" value="<?php echo $row['Password'] ?>" class="form-control" placeholder="Enter Password">
                        </div> -->
                        <a href="user_register.php" class="btn btn-danger"> CANCEL</a>
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