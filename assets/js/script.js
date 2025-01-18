'use strict';

/**
 * navbar toggle
 */

const overlay = document.querySelector("[data-overlay]");
const navbar = document.querySelector("[data-navbar]");
const navToggleBtn = document.querySelector("[data-nav-toggle-btn]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");

const navToggleFunc = function () {
  navToggleBtn.classList.toggle("active");
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
}

navToggleBtn.addEventListener("click", navToggleFunc);
overlay.addEventListener("click", navToggleFunc);

for (let i = 0; i < navbarLinks.length; i++) {
  navbarLinks[i].addEventListener("click", navToggleFunc);
}



/**
 * header active on scroll
 */

const header = document.querySelector("[data-header]");

window.addEventListener("scroll", function () {
  window.scrollY >= 10 ? header.classList.add("active")
    : header.classList.remove("active");
});



// Additional functions for editing, copying, and deleting bookings (simplified here)
function editBooking(id) {
  alert('Edit booking ID: ' + id);
}

function copyBooking(id) {
  alert('Copy booking ID: ' + id);
}

function deleteBooking(id) {
  alert('Delete booking ID: ' + id);
}


document.querySelectorAll('input[list="cities"]').forEach(input => {
  input.addEventListener('input', function () {
      const query = this.value;
      if (query.length > 1) { // Fetch suggestions after 2 characters
          fetch(`fetch_cities.php?query=${encodeURIComponent(query)}`)
              .then(response => response.json())
              .then(data => {
                  const dataList = this.list;
                  dataList.innerHTML = ''; // Clear previous options
                  data.forEach(city => {
                      const option = document.createElement('option');
                      option.value = city;
                      dataList.appendChild(option);
                  });
              });
      }
  });
});
