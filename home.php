<!DOCTYPE html>
<html>
<head>
    <title>Cars Rental</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/8954b3c36f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/IG.css">

</head>
<body>
<?php include('header.php'); ?>

<marquee><h1> Drive with Confidence, Travel with Comfort.</h1></marquee>

<div  class="hero">
    <div  class="booking-container">
        <div class="booking-options">
            <button  onclick="showOneWay(event)" class="active">One Way</button>
            <button onclick="showRoundTrip(event)">Round Trip</button>
            <button onclick="showLocal(event)">Local</button>
            <button onclick="showAirport(event)">Airport</button>
        </div>
        <div class="booking-form">
            <div class="form-group" id="airport-type-group" style="display: none;">
                <label for="airport-type">Trip</label>
                <select id="airport-type">
                    <option value="drop">Drop to Airport</option>
                    <option value="pickup">Pickup from Airport</option>
                </select>
            </div>
            <div class="form-group" id="from-group">
                <label for="from" style="font-size: 25px;">From</label><br>
                <input type="text" id="from" placeholder="Start typing city - e.g. Bangalore" required>
            </div>
            <div class="form-group" id="to-group">
                <label for="to" style="font-size: 25px;">To</label><br>
                <input type="text" id="to" placeholder="Start typing city - e.g. Mysore" required>
            </div>
            <div class="form-group" id="city-group" style="display: none;">
                <label for="city" style="font-size: 25px;">City</label><br>
                <input type="text" id="city" placeholder="Start typing city name - e.g. Bangalore" required>
            </div>
            <div class="form-group" id="pickup-date-group">
                <label for="pickup-date" style="font-size: 25px;">Pick Up</label>
                <input type="date" id="pickup-date" value="2024-06-11" required>
            </div>
            <div class="form-group" id="return-date-group" style="display: none;">
                <label for="return-date" style="font-size: 25px;">Return</label><br>
                <input type="date" id="return-date" value="2024-06-11" required>
            </div>
            <div class="form-group" id="pickup-time-group">
                <label for="pickup-time" style="font-size: 25px;">Pick Up At</label>
                <input type="time" id="pickup-time" value="07:00" required>
            </div>
        </div>
        <div class="explore-button-container">
            <button id="explore-button" class="explore-button" onclick="handleExploreClick()" disabled>Explore Cabs</button>
        </div>
    </div>
</div>



<div class="supporting">
    <h1>Find the Best Car Hire Deals in your Location</h1>
    <p>These are the most popular types of rental cars available for pickup at a location near you within the next 30 days.</p>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////// -->
<div class="container-section-cars">
    <div class="content-section-cars">
  <h1>  Welcome to Your Journey with Car Rental </h1>
  <p>Discover the freedom of the open road with Car Rental, your trusted companion for unforgettable travel experiences. For over [X] years, Car Rental has been a beacon of reliability in car rentals, navigating both bustling cities and remote escapes with unmatched reliability. Embrace the journey with confidence in our meticulously maintained vehicles tailored to your adventure—from sleek city cruisers to rugged SUVs built for off-road exploration. <br>
<br>
Dive into our curated guides and insider tips to uncover hidden gems, scenic viewpoints, and local favorites that transform your trip into an extraordinary adventure. Unlock exclusive discounts on attractions, accommodations, and more with our local partnerships to maximize savings and experiences along the way. Booking is effortless—reserve your ideal vehicle online or with our friendly support team in just a few clicks. Personalized support ensures your journey is as smooth as the ride itself, from booking to drop-off.<br>
<br></p>
<button onclick="location.href='#hero'">Book a car</button>

    </div>

    <div class="image-section-cars">
        <div class="img1">
           <img src="css/images/family3.jpg" height="350px" width="715">
        </div>

<div class="down-section">
    <div class="columns">
        <img src="css/images/family1.jpg" height="280px" width="350">
    </div>
    <div class="columns">
        <img src="css/images/family2.jpg" height="280px" width="350">
    </div>
</div>
    </div>
</div>



<!-- //////////////////////////////////////////////////////////////////////// -->

<div class="container">
    <h2>Why book with us?</h2>
    <div class="features">
        <div class="feature">
            <i class="fa-solid fa-gift" style="font-size: 40px;padding-bottom: 5%;"></i>
            <h3>Special offers</h3>
            <p>As a market leader, we get special offers like contactless pick-ups, great prices, and free upgrades.</p>
        </div>
        <div class="feature">
            <i class="fa-solid fa-trophy" style="font-size: 40px;padding-bottom: 5%;"></i>
            <h3>Award-winning</h3>
            <p>World's Leading Car Rental Booking Website in the World Travel Tech Awards (3 years in a row).</p>
        </div>
        <div class="feature">
            <i class="fa-solid fa-heart" style="font-size: 40px;padding-bottom: 5%;"></i>
            <h3>Highly-rated</h3>
            <p>A combined rating of 4.5 with 150k+ total reviews on platforms like Trustpilot, Google, and Review Center.</p>
        </div>
        <div class="feature">
            <i class="fa-solid fa-users" style="font-size: 40px;padding-bottom: 5%;"></i>
            <h3>4M users</h3>
            <p>Have already booked on one of the fastest-growing car rental booking websites.</p>
        </div>
    </div>
</div>

    <!--===================================================--->

 <!--===================================================--->
</div><div class="roadmap">
    <div class="onroad-support">
        <h1><B>24/7 Roadside Assistance</B></h1>
        <p>Enjoy peace of mind with our comprehensive 24/7 roadside assistance. 
           Whether you're navigating bustling cities or exploring remote escapes in India, 
           Car Rental ensures you're covered every step of the way. Focus on
           making the most of your journey while we handle any unexpected roadside needs.
    </div>
    <div class="img-roadmap">
        <img src="css/images/person.jpg" height="450px" width="300px" border-radius="10px">
        <img src="css/images/travel1.jpeg" height="450px" width="300px" border-radius=" 10px">
    </div>
</div>
<!-- ============================================================= -->
 
 <div class="bodies">
  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image: url('css/images/car-1.jpg')"></div>
      <div class="swiper-slide" style="background-image: url('css/images/car-2.jpg')"></div>
      <div class="swiper-slide" style="background-image: url('css/images/car-3.jpg')"></div>
      <div class="swiper-slide" style="background-image: url('css/images/car-5.jpg')"></div>
      <div class="swiper-slide" style="background-image: url('css/images/car-6.jpg')"></div>
    </div>
  </div>
</div>

<div class="scroller" data-animated="true">
    <ul class="img-list scroller__inner">
        <img src="css/images/toyota-logo.png" alt="toyota-logo"></li>
        <img src="css/images/mahindra-logo.png" alt="mahindra-logo"></li>
        <img src="css/images/Tata-logo.png" alt="Tata-logo"></li>
        <img src="css/images/bharatbenz logo.png" alt="bharatbenz-logo"></li>
        <img src="css/images/premier logo.png" alt="premier-logo"></li>
        <img src="css/images/force logo.png" alt="force-logo"></li>
        <img src="css/images/hindustan logo.png" alt="hindustan-logo"></li>
    </ul>
</div>

<!--======================================================================================================-->

<script>

        function showOneWay(event) {
            hideAllGroups();
            document.getElementById('from-group').style.display = 'block';
            document.getElementById('to-group').style.display = 'block';
            document.getElementById('pickup-date-group').style.display = 'block';
            document.getElementById('pickup-time-group').style.display = 'block';
            // event.target.classList.add('active');
            setActiveButton(event.target);
            document.getElementById('explore-button').disabled = false;
            console.log("One way selected");
        }

        function showRoundTrip(event) {
            hideAllGroups();
            document.getElementById('from-group').style.display = 'block';
            document.getElementById('to-group').style.display = 'block';
            document.getElementById('pickup-date-group').style.display = 'block';
            document.getElementById('return-date-group').style.display = 'block';
            document.getElementById('pickup-time-group').style.display = 'block';
            //event.target.classList.add('active');
            setActiveButton(event.target);
            document.getElementById('explore-button').disabled = false;
            console.log("Round Trip selected");
        }

        function showLocal(event) {
            hideAllGroups();
            document.getElementById('city-group').style.display = 'block';
            document.getElementById('pickup-date-group').style.display = 'block';
            document.getElementById('pickup-time-group').style.display = 'block';
            //event.target.classList.add('active');
            setActiveButton(event.target);
            document.getElementById('explore-button').disabled = false;
            console.log("Local selected");
        }

        function showAirport(event) {
            hideAllGroups();
            document.getElementById('airport-type-group').style.display = 'block';
            document.getElementById('city-group').style.display = 'block';
            document.getElementById('pickup-date-group').style.display = 'block';
            document.getElementById('pickup-time-group').style.display = 'block';
            //event.target.classList.add('active');
            setActiveButton(event.target);
            document.getElementById('explore-button').disabled = false;
            console.log("Airport selected");
        }

        function hideAllGroups() {
            document.getElementById('from-group').style.display = 'none';
            document.getElementById('to-group').style.display = 'none';
            document.getElementById('city-group').style.display = 'none';
            document.getElementById('pickup-date-group').style.display = 'none';
            document.getElementById('return-date-group').style.display = 'none';
            document.getElementById('pickup-time-group').style.display = 'none';
            document.getElementById('airport-type-group').style.display = 'none';

            const buttons = document.querySelectorAll('.booking-options button');
            buttons.forEach(button => button.classList.remove('active'));
        }


        function setActiveButton(button) {
        document.querySelectorAll('.booking-options button').forEach(btn => {
            btn.classList.remove('active');
        });
        button.classList.add('active');
        }
        function validateForm() {
            const bookingType = document.querySelector('.booking-options .active').innerText;

            if (bookingType === 'One Way' || bookingType === 'Round Trip') {
                return document.getElementById('from').value && document.getElementById('to').value;
            } else if (bookingType === 'Local') {
                return document.getElementById('city').value;
            } else if (bookingType === 'Airport') {
                return document.getElementById('city').value && document.getElementById('airport-type').value;
            }
            return false;
        }

        function handleExploreClick() {
        if (!validateForm()) {
            alert('Please fill out all required fields.');
            return;
        }
        const bookingType = document.querySelector('.booking-options .active').innerText;

        let pickup, dropoff, pickupTime, dropoffTime;

        if (bookingType === 'One Way' || bookingType === 'Round Trip') {
            pickup = document.getElementById('from').value;
            dropoff = document.getElementById('to').value;
        } else {
            pickup = document.getElementById('city').value;
            dropoff = document.getElementById('city').value;
        }

        pickupTime = document.getElementById('pickup-time').value;

        if (bookingType === 'Round Trip') {
            dropoffTime = document.getElementById('return-date').value;
        }

        document.getElementById('booking_type').value = bookingType;
        document.getElementById('pickup').value = pickup;
        document.getElementById('dropoff').value = dropoff;
        document.getElementById('pickup_date').value = document.getElementById('pickup-date').value;
        document.getElementById('return_date').value = bookingType === 'Round Trip' ? document.getElementById('return-date').value : '';
        document.getElementById('pickup_time').value = pickupTime;
        document.getElementById('airport_type').value = bookingType === 'Airport' ? document.getElementById('airport-type').value : '';

        document.getElementById('bookingForm').submit();
    }

        //For auto clicking any button
        window.onload = function() {
            // Trigger click on the "One Way" button
            document.querySelector('.booking-options button:nth-child(1)').click(); // This targets the first button (One Way)
        };
</script>

    <form id="bookingForm" action="bookings.php" method="post">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="booking_type" id="booking_type">
        <input type="hidden" name="pickup" id="pickup">
        <input type="hidden" name="dropoff" id="dropoff">
        <input type="hidden" name="pickup_date" id="pickup_date">
        <input type="hidden" name="return_date" id="return_date">
        <input type="hidden" name="pickup_time" id="pickup_time">
        <input type="hidden" name="airport_type" id="airport_type">
    </form>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="js/IG.js"></script>


</body>
</html>

<?php include('footer.php'); ?>