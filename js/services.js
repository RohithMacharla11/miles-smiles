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
