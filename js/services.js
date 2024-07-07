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
    if (priceFilter === 'low' && price > 6000) {
      show = false;
    }
    if (priceFilter === 'mid' && (price < 6000 || price > 9000)) {
      show = false;
    }
    if (priceFilter === 'high' && price < 9000) {
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

document.addEventListener("DOMContentLoaded", function() {
  const rentButtons = document.querySelectorAll(".btn.car-link");

  rentButtons.forEach(button => {
    button.addEventListener("click", function() {
      const carData = JSON.parse(this.getAttribute("data-car"));
      window.location.href = `details.php?car_id=${carData.id}`;
    });
  });
});


document.addEventListener('DOMContentLoaded', () => {
const bookedBtns = document.querySelectorAll('.booked-btn');
bookedBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    alert('This car is already booked.');
  });
});
});