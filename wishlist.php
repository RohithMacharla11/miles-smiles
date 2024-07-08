<?php
session_start();
include('config.php');

if (!isset($_SESSION["username"])) {
  header("Location: signin.php");
  exit();
}

$car_id = $_POST['car_id'];
$username = $_SESSION['username'];
$action = $_POST['action'];

if ($action == 'add') {
  $stmt = $conn->prepare("INSERT INTO wishlist (username, car_id) VALUES (:username, :car_id)");
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  $stmt->bindParam(':car_id', $car_id, PDO::PARAM_INT);
  $stmt->execute();
} elseif ($action == 'remove') {
  $stmt = $conn->prepare("DELETE FROM wishlist WHERE username = :username AND car_id = :car_id");
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  $stmt->bindParam(':car_id', $car_id, PDO::PARAM_INT);
  $stmt->execute();
}
?>
