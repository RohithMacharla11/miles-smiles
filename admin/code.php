<?php
include("security.php");
$connection = mysqli_connect("localhost", "root", "", "car_users");

if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if ($password === $cpassword) {
        $query = "INSERT INTO admin_register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            echo "Saved";
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
        } else {
            echo "Not Saved";
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: register.php');
        }
    } else {
        $_SESSION = "Password and Confirm Password Doesnot match";
        header('Location: register.php');
    }
}

if(isset($_POST['updatebtn'])){
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE admin_register SET username = '$username', email = '$email',password = '$password' where id = '$id'";
    $query_run= mysqli_query($connection,$query);

    if($query_run){
        $_SESSION['success']="YOUR DATA IS UPDATED";
        header('Location: register.php');
    }
    else{
        $_SESSION['status']="YOUR DATA IS NOT UPDATED";
        header('Location: register.php');
    }

}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin_register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: register.php'); 
    }    
}



if(isset($_POST['login_btn'])){
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query = "SELECT * FRoM admin_register where username = '$username_login' AND password='$password_login'";
    $query_run = mysqli_query($connection,$query);

    if(mysqli_fetch_array($query_run)){
        $_SESSION['username'] = $username_login;
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] = 'Email id /Password is Invalid';
        header('Location: login.php');
    }
}
?>