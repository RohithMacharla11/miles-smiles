
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/8954b3c36f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/details.css">
  <title>Cars</title>
</head>

<body>
  <?php include('header.php'); ?>
  <?php
  include('config.php');

  if (!isset($_GET['car_id'])) {
    echo "Car ID not provided!";
    exit();
  }

  $car_id = $_GET['car_id'];
  $stmt = $conn->prepare("
        SELECT c.*, b.booking_status 
        FROM cars c
        LEFT JOIN car_details cd ON c.car_id = cd.car_id
        LEFT JOIN bookings b ON cd.detail_id = b.car_details_id
        WHERE c.car_id = :car_id
    ");
  $stmt->bindParam(':car_id', $car_id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $car = $stmt->fetch();

  if ($car) {
    $details = json_decode($car['details']);
    $images = json_decode($car['images']);
    $isBooked = $car['booking_status'] === 'booked';
  ?>
    <div class="car-container-section">
      <div class="car-content-section">
        <h1><?php echo $car['title']; ?></h1><br>
        <div class="cont-gird">
          <div class="icon-first">
            <a><i class="fa-solid fa-clock"></i>&nbsp;&nbsp; <?php echo $details[0]; ?><br></a>
            <a><i class="fa-solid fa-car"></i>&nbsp;&nbsp; <?php echo $details[1]; ?><br></a>
            <a><i class="fa-solid fa-suitcase-rolling"></i>&nbsp;&nbsp; <?php echo $details[2]; ?><br></a>
            <a><i class="fa-solid fa-bag-shopping"></i>&nbsp;&nbsp; <?php echo $details[3]; ?><br></a>
          </div>
          <div class="icon-second">
            <a><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp; <?php echo $details[1]; ?><br></a>
            <a><i class="fa-solid fa-droplet"></i>&nbsp;&nbsp; <?php echo $details[0]; ?><br></a>
            <a><i class="fa-solid fa-gauge-simple-high"></i>&nbsp;&nbsp; <?php echo $details[0]; ?><br></a>
          </div>
        </div>
        <div class="arrow-section">
          <a><i class="fa-solid fa-angles-right"></i>&nbsp;&nbsp; <?php echo $details[2]; ?><br></a>
          <a><i class="fa-solid fa-angles-right"></i>&nbsp;&nbsp; <?php echo $details[0]; ?></a><br>
          <a><i class="fa-solid fa-angles-right"></i>&nbsp;&nbsp; <?php echo $details[2]; ?></a><br>
          <a><i class="fa-solid fa-angles-right"></i>&nbsp;&nbsp; <?php echo $details[2]; ?></a><br>
          <a><i class="fa-solid fa-angles-right"></i>&nbsp;&nbsp; <?php echo $details[2]; ?></a><br>
        </div>
        <div class="price-section">
          <p class="price" id="car-price"><?php echo $car['price']; ?> / day</p>
          <?php if ($isBooked) { ?>
            <button class="btn booked-btn" disabled>Booked</button>
          <?php } else { ?>
            <button class="btn" id="rent-now-btn">Rent now</button>
          <?php } ?>
        </div>

      </div>
      <div class="car-section">
        <img src="<?php echo $images[0]; ?>" height="350px" width="608px" style="border-radius:20px 0 0 0;">
        <div class="car-gird">
          <img src="<?php echo $images[1]; ?>" height="186px" width="300px">
          <img src="<?php echo $images[2]; ?>" height="186px" width="300px">
          <img src="<?php echo $images[3]; ?>" height="186px" width="300px" style="border-radius:0 0 0 20px;">
          <img src="<?php echo $images[4]; ?>" height="186px" width="300px">
        </div>
      </div>
    </div>
    <form id="bookingForm" action="save_booking.php" method="post">
      <input type="hidden" name="detail_id" id="detail-id">
      <input type="hidden" name="car_id" id="car-id" value="<?php echo $car['car_id']; ?>">
      <input type="hidden" name="title" id="car-title-hidden" value="<?php echo $car['title']; ?>">
      <input type="hidden" name="year" id="car-year-hidden" value="<?php echo $car['year']; ?>">
      <input type="hidden" name="price" id="car-price-hidden" value="<?php echo $car['price']; ?>">
      <input type="hidden" name="details" id="car-details-hidden" value="<?php echo $car['details']; ?>">
      <input type="hidden" name="images" id="car-images-hidden" value="<?php echo $car['images']; ?>">
      <input type="hidden" name="username" id="username-hidden">
      <input type="hidden" name="rent_now" value="rent_now">
    </form>
  <?php
  } else {
    echo "Car not found!";
  }
  ?>
  <br>
  <div class="reviews">
    <h2>Description</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <h2>Reviews</h2>
    <div id="review-list">
      <!-- Reviews will be appended here -->
    </div>
    <div class="add-review">
      <h3>Add a Review</h3>
      <div class="rating">
        <input type="radio" class="star" id="star5" name="rating" data-value="5"><label for="star5">★</label>
        <input type="radio" class="star" id="star4" name="rating" data-value="4"><label for="star4">★</label>
        <input type="radio" class="star" id="star3" name="rating" data-value="3"><label for="star3">★</label>
        <input type="radio" class="star" id="star2" name="rating" data-value="2"><label for="star2">★</label>
        <input type="radio" class="star" id="star1" name="rating" data-value="1"><label for="star1">★</label>
      </div>
      <textarea id="review-text" placeholder="Write your review here..."></textarea>
      <input type="file" id="review-media" accept="image/*,video/*">
      <button class="btn" id="review-submit">Submit</button>
    </div>
  </div>

  <?php include('footer.php'); ?>
  <script src="js/details.js"></script>
</body>

</html>
