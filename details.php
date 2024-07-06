<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Details</title>
  <link rel="stylesheet" href="css/details.css">
</head>

<body>
  <?php include('header.php');
  if (!isset($_SESSION["username"])) {
    header("signin.php");
  }
  ?>

  <div class="car-details">
    <div class="car-info">
      <h1 id="car-title"></h1>
      <div class="rating">
        <span id="average-rating">0.0</span>
        <span id="total-ratings">(0 ratings)</span>
      </div>
      <p><strong>Year:</strong> <span id="car-year"></span></p>
      <div id="car-details"></div>
      <p class="price" id="car-price"></p>
      <button class="btn" id="rent_btn">Rent now</button>
    </div>
    <div class="carousel">
      <div class="carousel-inner">
        <!-- Carousel items will be inserted here dynamically -->
      </div>
      <button class="carousel-control-prev" onclick="prevSlide()">&#10094;</button>
      <button class="carousel-control-next" onclick="nextSlide()">&#10095;</button>
    </div>
  </div>
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

  <form id="bookingForm" action="save_booking.php" method="post">
    <input type="hidded" name="detail_id" id="detail-id">
    <input type="hidden" name="car_id" id="car-id">
    <input type="hidden" name="title" id="car-title-hidden">
    <input type="hidden" name="year" id="car-year-hidden">
    <input type="hidden" name="price" id="car-price-hidden">
    <input type="hidden" name="details" id="car-details-hidden">
    <input type="hidden" name="images" id="car-images-hidden">
    <input type="hidden" name="username" id="username-hidden">
    <input type="hidden" name="rent_now" value="rent_now">
  </form>

  <script src="js/details.js"></script>
</body>

</html>



<?php include('footer.php'); ?>