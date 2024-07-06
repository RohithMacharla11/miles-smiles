<?php
include("security.php");
$connection = mysqli_connect("localhost", "root", "", "car_users");

if (isset($_POST['uregisterbtn'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (fullname,username,email,phone,password) VALUES ('$fullname','$username','$email','$phone','$password')";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo "Saved";
        $_SESSION['success'] = "User Profile Added";
        header('Location: user_register.php');
    } 
    else {
        echo "Not Saved";
        $_SESSION['status'] = "User Profile Not Added";
        header('Location: user_register.php');
    }
}

if(isset($_POST['updatebtn'])){
    $id = $_POST['edit_id'];
    $fullname = $_POST['edit_fullname'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $phone = $_POST['edit_phone'];
    $password = $_POST['edit_password'];

    $query = "UPDATE users SET fullname = '$fullname', email = '$email', phone = '$phone', password = '$password' where username = '$username'";
    $query_run= mysqli_query($connection,$query);

    if($query_run){
        $_SESSION['success']="USER DATA IS UPDATED";
        header('Location: user_register.php');
    }
    else{
        $_SESSION['status']="USER DATA IS NOT UPDATED";
        header('Location: user_register.php');
    }

}
// if (isset($_POST['delete_btn'])) {
//     $username = $_POST['delete_username'];

//     // Escape the username to prevent SQL injection
//     $username = mysqli_real_escape_string($connection, $username);

//     $query = "DELETE FROM users WHERE username='$username'";
//     $query_run = mysqli_query($connection, $query);

//     if ($query_run) {
//         $_SESSION['success'] = "User Data is Deleted";
//         header('Location: user_register.php');
//     } else {
//         $_SESSION['status'] = "User Data is NOT DELETED";
//         header('Location: user_register.php');
//     }
// }

?>