<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental</title>
  <link rel="stylesheet" href="css/services.css">
</head>
<body>
  
<?php include('header.php'); 
  if(!isset($_SESSION["username"])){
    header("signin.php");
  }
?>
  
<section class="section-featured-car">
  <div class="container">
    <ul class="featured-car-list">
      <?php
      include('config.php');
      $stmt = $conn->prepare("
            SELECT c.*, b.booking_status 
            FROM cars c
            LEFT JOIN car_details cd ON c.car_id = cd.car_id
            LEFT JOIN bookings b ON cd.detail_id = b.car_details_id
        ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cars = $stmt->fetchAll();

      foreach ($cars as $row) {
        $details = json_decode($row['details']);
        $images = json_decode($row['images']);
        $isBooked = $row['booking_status'] === 'booked';
        echo '<li class="car-item ' . strtolower(explode(' ', $row['title'])[0]) . ' show" data-brand="' . strtolower(explode(' ', $row['title'])[0]) . '" data-price="' . str_replace(['₹', '/day', '/day'], '', $row['price']) . '" data-ac="' . (in_array("AC", $details) ? 'ac' : 'non-ac') . '" data-seating="' . explode(' ', $details[0])[0] . '">';
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
        echo '                <li class="card-list-item"><ion-icon name="people-outline"></ion-icon><span class="card-item-text">' . $details[0] . '</span></li>';
        echo '                <li class="card-list-item"><ion-icon name="flash-outline"></ion-icon><span class="card-item-text">' . $details[1] . '</span></li>';
        echo '                <li class="card-list-item"><ion-icon name="speedometer-outline"></ion-icon><span class="card-item-text">' . $details[2] . '</span></li>';
        echo '                <li class="card-list-item"><ion-icon name="hardware-chip-outline"></ion-icon><span class="card-item-text">' . $details[3] . '</span></li>';
        echo '            </ul>';
        echo '            <div class="card-price-wrapper">';
        echo '                <p class="card-price"><strong>' . $row['price'] . '</strong> / ' . (strpos($row['price'], 'day') ? 'day' : 'day') . '</p>';
        if ($isBooked) {
          echo '                <button class="btn booked-btn">Booked</button>';
      } 
      else {
        echo '                <button class="btn car-link" data-car=\'{"id": "' . $row['car_id'] . '","title": "' . $row['title'] . '", "year": "' . $row['year'] . '", "price": "' . $row['price'] . '", "details": ' . json_encode($details) . ', "images": ' . json_encode($images) . '}\'>Rent now</button>';
      }
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</li>';
      }
    
      ?>
    </ul>
  </div>
  <div class="filter-section">
    <h3>Filter Cars</h3>
    <form id="filter-form">
      <div class="filter-group">
        <label for="brand">Brand</label>
        <select id="brand" name="brand">
          <option value="all">All</option>
          <option value="honda">Honda</option>
          <option value="ford">Ford</option>
          <option value="tesla">Tesla</option>
          <option value="bmw">BMW</option>
          <option value="mercedes">Mercedes</option>
          <option value="chevrolet">Chevrolet</option>
          <option value="nissan">Nissan</option>
          <option value="hyundai">Hyundai</option>
        </select>
      </div>
      <div class="filter-group">
        <label for="price">Price</label>
        <select id="price" name="price">
          <option value="all">All</option>
          <option value="low">Below ₹6000</option>
          <option value="mid">₹6000 - ₹9000</option>
          <option value="high">Above ₹9000</option>
        </select>
      </div>
      <div class="filter-group">
        <label for="ac">AC</label>
        <select id="ac" name="ac">
          <option value="all">All</option>
          <option value="ac">AC</option>
          <option value="non-ac">Non-AC</option>
        </select>
      </div>
      <div class="filter-group">
        <label for="seating">Seating Capacity</label>
        <select id="seating" name="seating">
          <option value="all">All</option>
          <option value="4">4 People</option>
          <option value="6">6 People</option>
          <option value="8">8 People</option>
        </select>
      </div>
      <button type="button" onclick="applyFilters()">Apply Filters</button>
    </form>
  </div>
</section>
<script src="js/services.js"></script>
<?php include('footer.php'); ?>
</body>
</html>
