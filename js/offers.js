document.addEventListener('DOMContentLoaded', function() {
  const bookNowButtons = document.querySelectorAll('.book-now');
  const destinationInput = document.getElementById('destinationInput');
  const label = document.querySelector('label[for="destinationInput"]');

  // Ensure destinationInput exists before accessing its properties
  if (destinationInput) {
    // Handle "Book Now" button click event
    bookNowButtons.forEach(button => {
      button.addEventListener('click', function() {
        const destination = this.getAttribute('data-destination');
        destinationInput.value = destination;

        // Manually trigger the input event to move the label up
        const inputEvent = new Event('input', {
          bubbles: true,
          cancelable: true,
        });
        destinationInput.dispatchEvent(inputEvent);

        window.location.href = `index.php?destination=${destination}#searchFlight1`;
      });
    });

    // Check if the input field is pre-filled when the page loads
    if (destinationInput.value.trim() !== '') {
      label.classList.add('label-on-top');
    }

    // Handle input field events
    destinationInput.addEventListener('input', function() {
      if (this.value.trim() !== '') {
        label.classList.add('label-on-top');
      } else {
        label.classList.remove('label-on-top');
      }
    });

    destinationInput.addEventListener('focus', function() {
      label.classList.add('label-on-top');
    });

    destinationInput.addEventListener('blur', function() {
      if (this.value.trim() === '') {
        label.classList.remove('label-on-top');
      }
    });
  }
});

function redirectToIndex(destination) {
  window.location.href = `index.php?destination=${destination}#searchFlight1`;
}
