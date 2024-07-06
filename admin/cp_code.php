<?php
include('security.php');

if (isset($_POST['updatebtn'])) {
    $connection = mysqli_connect("localhost", "root", "", "car_users");

    $id = $_POST['edit_id'];
    $old_password = $_POST['edit_old_password'];
    $new_password = $_POST['edit_new_password'];
    $confirm_password = $_POST['edit_con_password'];

    $query = "SELECT * FROM admin_register WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($query_run);

    if ($row['password'] == $old_password) {
        if ($new_password == $confirm_password) {
            $update_query = "UPDATE admin_register SET password='$new_password' WHERE id='$id'";
            $update_query_run = mysqli_query($connection, $update_query);

            if ($update_query_run) {
                $_SESSION['status'] = "Password Updated Successfully";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Password Update Failed";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status'] = "New Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    } else {
        $_SESSION['status'] = "Old Password Does Not Match";
        $_SESSION['status_code'] = "warning";
        header('Location: register.php');
    }
}
?>
