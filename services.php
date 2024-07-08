<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental</title>
  <link rel="stylesheet" href="css/services.css">
  <script src="https://kit.fontawesome.com/8954b3c36f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/collection/components/icon/icon.min.css">
</head>

<body>

  <?php include('header.php');
  if (!isset($_SESSION["username"])) {
    header("Location: signin.php");
    exit();
  }
  ?>

  <section class="section-featured-car">
    <div class="container">
      <ul class="featured-car-list">
        <?php
        include('config.php');
        $stmt = $conn->prepare("
    SELECT c.*, b.booking_status, b.pickup_date, b.return_date, w.wishlist_id
    FROM cars c
    LEFT JOIN car_details cd ON c.car_id = cd.car_id
    LEFT JOIN bookings b ON cd.detail_id = b.car_details_id
    LEFT JOIN wishlist w ON c.car_id = w.car_id AND w.username = :username
    WHERE c.car_status = 'active'
    ORDER BY c.car_id
");

        $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cars = $stmt->fetchAll();

        $currentDate = new DateTime();

        foreach ($cars as $row) {
          $details = json_decode($row['details']);
          $images = json_decode($row['images']);
          $isBooked = false;

          if (!empty($row['pickup_date']) && !empty($row['return_date'])) {
            $pickupDate = new DateTime($row['pickup_date']);
            $returnDate = new DateTime($row['return_date']);

            if ($currentDate >= $pickupDate && $currentDate <= $returnDate) {
              $isBooked = true;
            }
          }
          $isWishlisted = $row['wishlist_id'] !== null;

          echo '<li class="car-item ' . strtolower(explode(' ', $row['title'])[0]) . ' show ' . ($isBooked ? 'booked' : '') . '" data-brand="' . strtolower(explode(' ', $row['title'])[0]) . '" data-price="' . str_replace(['₹', '/day'], '', $row['price']) . '" data-ac="' . (in_array("AC", $details) ? 'ac' : 'non-ac') . '" data-seating="' . explode(' ', $details[0])[0] . '">';
          echo '    <div class="featured-car-card">';
          if ($isBooked) {
            echo '      <div class="booked-overlay">Booked</div>';
          }
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
          if ($isBooked) {
            echo '                <button class="btn booked-btn">Booked</button>';
          } else {
            echo '                <button class="btn wishlist-btn ' . ($isWishlisted ? 'wishlisted' : '') . '" data-car-id="' . $row['car_id'] . '">';
            echo '                    <i class="' . ($isWishlisted ? 'fa-solid fa-heart' : 'fa-regular fa-heart') . '"></i>';
            echo '                </button>';
            echo '                <a href="details.php?car_id=' . $row['car_id'] . '" class="btn">Rent now</a>';
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