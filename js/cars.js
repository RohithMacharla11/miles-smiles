document.addEventListener('DOMContentLoaded', () => {
  const carLinks = document.querySelectorAll('.car-link');
  carLinks.forEach(link => {
    link.addEventListener('click', event => {
      event.preventDefault();
      const carData = JSON.parse(link.getAttribute('data-car'));
      sessionStorage.setItem('selectedCar', JSON.stringify(carData));
      localStorage.setItem('selectedCar', JSON.stringify(carData)); // Store in local storage
      window.location.href = link.href;
    });
  });

  const rentNowButtons = document.querySelectorAll('.btn'); // Assuming "Rent now" buttons have the class 'btn'
  rentNowButtons.forEach(button => {
    button.addEventListener('click', event => {
      event.preventDefault();
      const carItem = button.closest('.car-item');
      const carData = {
        id: carItem.querySelector('.car-link').getAttribute('data-car').id,
        title: carItem.querySelector('.card-title').innerText,
        year: carItem.querySelector('.year').innerText,
        imgSrc: carItem.querySelector('img').src,
        details: Array.from(carItem.querySelectorAll('.card-item-text')).map(detail => detail.innerText),
        price: carItem.querySelector('.card-price').innerText,
        images: Array.from(carItem.querySelectorAll('img')).map(img => img.src)
      };
      sessionStorage.setItem('selectedCar', JSON.stringify(carData));
      localStorage.setItem('selectedCar', JSON.stringify(carData)); // Store in local storage
      window.location.href = carItem.querySelector('.car-link').href;
    });
  });
});

window.addEventListener('popstate', event => {
  if (event.state) {
    loadDetailsPage('details.html', event.state);
  } else {
    location.reload();
  }
});

function loadDetailsPage(url, data) {
  fetch(url)
    .then(response => response.text())
    .then(html => {
      document.body.innerHTML = html;
      populateDetailsPage(data);
      window.scrollTo(0, 0);
    })
    .catch(err => console.error('Failed to load the details page:', err));
}

function populateDetailsPage(data) {
  document.getElementById('car-title').innerText = data.title;
  document.getElementById('car-year').innerText = data.year;
  document.getElementById('car-img').src = data.imgSrc;
  document.getElementById('car-price').innerText = data.price;

  const detailsContainer = document.getElementById('car-details');
  data.details.forEach(detail => {
    const p = document.createElement('p');
    p.innerText = detail;
    detailsContainer.appendChild(p);
  });

  let ratings = JSON.parse(localStorage.getItem(`${data.title}-ratings`)) || [];
  let reviews = JSON.parse(localStorage.getItem(`${data.title}-reviews`)) || [];

  const reviewList = document.getElementById('review-list');
  reviews.forEach(review => {
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
  });

  updateRatings();

  document.getElementById('review-submit').addEventListener('click', () => {
    const rating = document.querySelector('input[name="rating"]:checked');
    const reviewText = document.getElementById('review-text').value;
    const reviewMedia = document.getElementById('review-media').files[0];

    if (!rating || !reviewText) {
      alert('Please provide a rating and review text.');
      return;
    }

    const reviewItem = {
      text: reviewText,
      rating: parseInt(rating.value),
      media: reviewMedia ? URL.createObjectURL(reviewMedia) : null,
      mediaType: reviewMedia ? reviewMedia.type : null
    };

    reviews.push(reviewItem);
    ratings.push(parseInt(rating.value));

    localStorage.setItem(`${data.title}-ratings`, JSON.stringify(ratings));
    localStorage.setItem(`${data.title}-reviews`, JSON.stringify(reviews));

    const reviewElement = document.createElement('div');
    reviewElement.className = 'review';
    reviewElement.innerHTML = `<p><strong>User:</strong> ${reviewText}</p>`;

    if (reviewItem.media) {
      const mediaElement = document.createElement(reviewItem.mediaType.startsWith('video/') ? 'video' : 'img');
      mediaElement.src = reviewItem.media;
      if (reviewItem.mediaType.startsWith('video/')) {
        mediaElement.controls = true;
      }
      reviewElement.appendChild(mediaElement);
    }

    reviewList.appendChild(reviewElement);

    updateRatings();
    clearReviewForm();
  });

  function updateRatings() {
    const totalRatings = ratings.length;
    const averageRating = (ratings.reduce((sum, rating) => sum + rating, 0) / totalRatings).toFixed(1);
    document.getElementById('average-rating').innerText = averageRating;
    document.getElementById('total-ratings').innerText = `(${totalRatings} ratings)`;
  }

  function clearReviewForm() {
    const checkedRating = document.querySelector('input[name="rating"]:checked');
    if (checkedRating) {
      checkedRating.checked = false;
    }
    document.getElementById('review-text').value = '';
    document.getElementById('review-media').value = '';
  }
}

function applyFilters() {
  const brandFilter = document.getElementById('brand').value;
  const priceFilter = document.getElementById('price').value;
  const acFilter = document.getElementById('ac').value;
  const seatingFilter = document.getElementById('seating').value;

  document.querySelectorAll('.car-item').forEach(car => {
    const brand = car.getAttribute('data-brand');
    const price = parseInt(car.getAttribute('data-price'));
    const ac = car.getAttribute('data-ac');
    const seating = car.getAttribute('data-seating');

    let show = true;

    if (brandFilter !== 'all' && brand !== brandFilter) {
      show = false;
    }
    if (priceFilter === 'low' && price > 15000) {
      show = false;
    }
    if (priceFilter === 'mid' && (price < 15000 || price > 20000)) {
      show = false;
    }
    if (priceFilter === 'high' && price < 20000) {
      show = false;
    }
    if (acFilter !== 'all' && ac !== acFilter) {
      show = false;
    }
    if (seatingFilter !== 'all' && seating !== seatingFilter) {
      show = false;
    }

    car.style.display = show ? 'block' : 'none';
  });
}

document.addEventListener("DOMContentLoaded", function() {
  applyFilters();
});

document.getElementById('brand').addEventListener('change', applyFilters);
document.getElementById('price').addEventListener('change', applyFilters);
document.getElementById('ac').addEventListener('change', applyFilters);
document.getElementById('seating').addEventListener('change', applyFilters);



document.addEventListener('DOMContentLoaded', () => {
  const carLinks = document.querySelectorAll('.car-link');
  carLinks.forEach(link => {
    link.addEventListener('click', event => {
      event.preventDefault();
      const carData = JSON.parse(link.getAttribute('data-car'));
      sessionStorage.setItem('selectedCar', JSON.stringify(carData));
      window.location.href = link.href;
    });
  });
});
