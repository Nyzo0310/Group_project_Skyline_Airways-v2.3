  // Function to handle form submission
  document.getElementById('contactForm').addEventListener('submit', function(event) {
    // Prevent default form submission
    event.preventDefault();

    // Get form inputs
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    // Display notification
    var notification = document.getElementById('notification');
    notification.textContent = 'The message has been submitted';
    notification.style.display = 'block';

    // Reset form inputs
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('message').value = '';
});

// Function to clear notification when any input field changes
document.getElementById('name').addEventListener('input', clearNotification);
document.getElementById('email').addEventListener('input', clearNotification);
document.getElementById('message').addEventListener('input', clearNotification);

function clearNotification() {
    var notification = document.getElementById('notification');
    notification.style.display = 'none';
}