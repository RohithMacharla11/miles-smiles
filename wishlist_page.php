<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wishlist</title>
  <link rel="stylesheet" href="css/services.css">
  <script src="https://kit.fontawesome.com/8954b3c36f.js" crossorigin="anonymous"></script>
</head>
<style>
  .section-featured-car{
    margin-left: 350px;
  }
</style>

<body>

<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: signin.php");
    exit();
}

?>
<?php include('navigation.php'); ?>
<section class="section-featured-car">
  <div class="container">
    <ul class="featured-car-list">
      <?php
      include('config.php');
      
      $stmt = $conn->prepare("
        SELECT c.*, w.wishlist_id
        FROM cars c
        LEFT JOIN wishlist w ON c.car_id = w.car_id AND w.username = :username
        WHERE w.wishlist_id IS NOT NULL
      ");

      $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $cars = $stmt->fetchAll();
      if(empty($cars)){
          echo "Wishlist is Empty";
          echo '<button class="btn wishlist-btn " type="button" onclick="location.href=\'services.php\'">Back to Services</button>';
        }
      foreach ($cars as $row) {
        
        $details = json_decode($row['details']);
        $images = json_decode($row['images']);
        
        $isWishlisted = $row['wishlist_id'] !== null;
        echo '<li class="car-item ' . strtolower(explode(' ', $row['title'])[0]) . ' show">';
        echo '    <div class="featured-car-card">';
        echo '        <figure class="card-banner">';
        echo '            <img src="' . $images[0] . '" alt="' . $row['title'] . '">';
        echo '        </figure>';
        echo '        <div class="card-content">';
        echo '            <div class="card-title-wrapper">';
        echo '                <h3 class="h3 card-title"><a href="#">' . $row['title'] . '</a></h3>';
        echo '                <data class="year" value="' . $row['year'] . '">' . $row['year'] . '</data>';
        echo '            </div>';
        echo '            <ul class="card-list">';
        echo '                <li class="card-list-item"><i class="fa-solid fa-headset"></i><span class="card-item-text">' . $details[0] . '</span></li>';
        echo '                <li class="card-list-item"><ion-icon name="flash-outline"></ion-icon><span class="card-item-text">' . $details[1] . '</span></li>';
        echo '                <li class="card-list-item"><ion-icon name="speedometer-outline"></ion-icon><span class="card-item-text">' . $details[2] . '</span></li>';
        echo '                <li class="card-list-item"><ion-icon name="hardware-chip-outline"></ion-icon><span class="card-item-text">' . $details[3] . '</span></li>';
        echo '            </ul>';
        echo '            <div class="card-price-wrapper">';
        echo '                <p class="card-price"><strong>' . $row['price'] . '</strong> / day</p>';
        // echo '                <button class="btn wishlist-btn " data-car-id="' . $row['car_id'] . '">Remove from Wishlist</button>';
        echo '                   <button class="btn wishlist-btn " type="button" onclick="location.href=\'services.php\'">Back to Services</button>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</li>';
      }
      ?>
    </ul>
  </div>
</section>

<script src="js/services.js"></script>

</body>
</html>
