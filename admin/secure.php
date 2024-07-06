<?php
session_start();
include('dbconfig.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location:config.php");
}

if(!$_SESSION['admin_username'])
{
    header('Location: signin.php');
}
?>