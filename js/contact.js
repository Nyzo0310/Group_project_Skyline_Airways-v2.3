document.getElementById('contactForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form submission

  // Get form inputs
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var message = document.getElementById('message').value;

  // Create FormData object to send form data
  var formData = new FormData();
  formData.append('name', name);
  formData.append('email', email);
  formData.append('message', message);

  // Send form data to the server using AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../models/message.php', true);
  xhr.onload = function() {
      if (xhr.status === 200) {
          var response = xhr.responseText;
          if (response.includes('submitted successfully')) {
              // Display success message
              var successMessage = document.createElement('div');
              successMessage.classList.add('success-message');
              successMessage.textContent = response;
              document.body.appendChild(successMessage);

              // Reset form fields
              document.getElementById('name').value = '';
              document.getElementById('email').value = '';
              document.getElementById('message').value = '';
          } else {
              // Display error message
              alert(response);
          }
      } else {
          // Display error message
          alert('Error: Unable to submit the form. Please try again later.');
      }
  };
  xhr.onerror = function() {
      // Display error message
      alert('Error: Unable to make the request. Please check your network connection.');
  };
  xhr.send(formData);
});
