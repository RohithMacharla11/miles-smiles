let ratings = [];
let selectedRating = 0;
let currentCarId = null;
let currentSlideIndex = 0; // Track the current slide index

document.addEventListener('DOMContentLoaded', () => {
  const carData = JSON.parse(sessionStorage.getItem('selectedCar'));
  if (carData) {
    populateDetailsPage(carData);
    populateHiddenInputs(carData);
  }

  document.getElementById('rent_btn').addEventListener('click', (event) => {
    event.preventDefault(); // Prevent default form submission for debugging
    console.log('Form data before submission:', getFormData());
    document.getElementById('bookingForm').submit();
  });

  attachEventListeners(); // Attach event listeners for review and rating
});

function populateDetailsPage(data) {
  document.getElementById('car-title').innerText = data.title;
  document.getElementById('car-year').innerText = data.year;
  document.getElementById('car-price').innerText = data.price;

  const detailsContainer = document.getElementById('car-details');
  detailsContainer.innerHTML = ''; 
  data.details.forEach(detail => {
    const p = document.createElement('p');
    p.innerText = detail;
    detailsContainer.appendChild(p);
  });

  const carouselInner = document.querySelector('.carousel-inner');
  carouselInner.innerHTML = ''; 
  data.images.forEach((imgSrc, index) => {
    const div = document.createElement('div');
    div.className = 'carousel-item' + (index === 0 ? ' active' : '');
    const img = document.createElement('img');
    img.src = imgSrc;
    div.appendChild(img);
    carouselInner.appendChild(div);
  });
  showSlide(currentSlideIndex); // Show the initial slide
}

function populateHiddenInputs(data) {
  document.getElementById('car-id').value = data.id;
  document.getElementById('car-title-hidden').value = data.title;
  document.getElementById('car-year-hidden').value = data.year;
  document.getElementById('car-price-hidden').value = data.price;
  document.getElementById('car-details-hidden').value = data.details.join(', ');
  document.getElementById('car-images-hidden').value = data.images.join(', ');
  const username = sessionStorage.getItem('username');
  document.getElementById('username-hidden').value = username;
}

function getFormData() {
  return {
    car_id: document.getElementById('car-id').value,
    title: document.getElementById('car-title-hidden').value,
    year: document.getElementById('car-year-hidden').value,
    price: document.getElementById('car-price-hidden').value,
    details: document.getElementById('car-details-hidden').value,
    images: document.getElementById('car-images-hidden').value
  };
}

function attachEventListeners() {
  document.querySelectorAll('.star').forEach(star => {
    star.addEventListener('click', selectRating);
  });

  document.getElementById('review-submit').addEventListener('click', addReview);
  document.getElementById('rent_btn').addEventListener('click', handleRentNow);

  // Carousel controls
  document.querySelector('.carousel-control-prev').addEventListener('click', prevSlide);
  document.querySelector('.carousel-control-next').addEventListener('click', nextSlide);
}

function selectRating(event) {
  const value = parseInt(event.target.getAttribute('data-value'));
  selectedRating = value;

  document.querySelectorAll('.star').forEach(star => {
    star.classList.toggle('selected', parseInt(star.getAttribute('data-value')) <= value);
  });
}

function addReview() {
  const reviewText = document.getElementById('review-text').value.trim();
  const reviewMedia = document.getElementById('review-media').files[0];

  if (!selectedRating || !reviewText) {
    alert('Please provide a rating and review text.');
    return;
  }

  const review = {
    text: reviewText,
    rating: selectedRating,
    media: reviewMedia ? URL.createObjectURL(reviewMedia) : null,
    mediaType: reviewMedia ? reviewMedia.type : null
  };

  saveReview(review);
  displayReview(review);
  ratings.push(selectedRating);
  updateRatings();

  clearReviewForm();
}

function saveReview(review) {
  const savedReviews = JSON.parse(localStorage.getItem(`reviews-${currentCarId}`)) || [];
  savedReviews.push(review);
  localStorage.setItem(`reviews-${currentCarId}`, JSON.stringify(savedReviews));
}

function loadReviews() {
  const savedReviews = JSON.parse(localStorage.getItem(`reviews-${currentCarId}`)) || [];
  savedReviews.forEach(review => {
    displayReview(review);
    ratings.push(review.rating);
  });
  updateRatings();
}

function displayReview(review) {
  const reviewList = document.getElementById('review-list');
  const reviewItem = document.createElement('div');
  reviewItem.className = 'review';
  reviewItem.innerHTML = `<p><strong>User:</strong> ${review.text}</p>`;

  if (review.media) {
    const mediaElement = document.createElement(review.mediaType.startsWith('video/') ? 'video' : 'img');
    mediaElement.src = review.media;
    if (review.mediaType.startsWith('video/')) {
      mediaElement.controls = true;
    }
    reviewItem.appendChild(mediaElement);
  }

  reviewList.appendChild(reviewItem);
}

function updateRatings() {
  const totalRatings = ratings.length;
  const averageRating = totalRatings > 0 ? (ratings.reduce((sum, rating) => sum + rating, 0) / totalRatings).toFixed(1) : 0;

  document.getElementById('average-rating').innerText = averageRating;
  document.getElementById('total-ratings').innerText = `(${totalRatings} ratings)`;
}

function clearReviewForm() {
  document.querySelectorAll('.star').forEach(star => {
    star.classList.remove('selected');
  });
  selectedRating = 0;
  document.getElementById('review-text').value = '';
  document.getElementById('review-media').value = '';
}

function handleRentNow() {
  const form = document.getElementById('bookingForm');
  form.submit();
}

// Carousel functions
function showSlide(index) {
  const slides = document.querySelectorAll('.carousel-item');
  slides.forEach((slide, i) => {
    slide.style.display = (i === index) ? 'block' : 'none';
  });
}

function nextSlide() {
  const slides = document.querySelectorAll('.carousel-item');
  currentSlideIndex = (currentSlideIndex + 1) % slides.length;
  showSlide(currentSlideIndex);
}

function prevSlide() {
  const slides = document.querySelectorAll('.carousel-item');
  currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
  showSlide(currentSlideIndex);
}
