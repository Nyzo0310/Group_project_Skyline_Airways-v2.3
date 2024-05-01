document.addEventListener("DOMContentLoaded", function () {
    const subscribeForm = document.querySelector(".subscribe__form");
  
    // Add submit event listener to subscribe form
    subscribeForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission behavior
  
        const userEmailInput = subscribeForm.querySelector("input[type='text']");
        const userEmail = userEmailInput.value.trim();
  
        if (userEmail === "") {
            // If no data entered, display error message
            alert("Please enter your email to subscribe.");
            userEmailInput.focus(); // Set focus on the email input field
        } else {
            // If email is entered, proceed with subscription
            alert(`Thank you for subscribing! You will receive latest news at ${userEmail}.`);
            subscribeForm.reset(); // Reset the form after submission
        }
    });
  
    const inputFields = document.querySelectorAll(".input__content input");
  
  // Function to add focus class to label when input is focused
  function handleFocus() {
      const parent = this.parentElement.parentElement;
      parent.classList.add("focus");
  }
  
  // Function to add data class to label when input has data
  function handleInput() {
      const parent = this.parentElement.parentElement;
      if (this.value !== "") {
          parent.classList.add("data");
      } else {
          parent.classList.remove("data");
      }
  }
  
  // Check input fields on page load and add data class to labels if they have values
  window.addEventListener("DOMContentLoaded", () => {
      inputFields.forEach(inputField => {
          if (inputField.value !== "") {
              const parent = inputField.parentElement.parentElement;
              parent.classList.add("data");
          }
      });
  });
  
  // Attach focus and input event listeners to input fields
  inputFields.forEach(inputField => {
      inputField.addEventListener("focus", handleFocus);
      inputField.addEventListener("input", handleInput);
  });
  
  
    const bookingForm = document.querySelector(".booking__container form");
  
    // Add submit event listener to booking form
    bookingForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission behavior
  
        const locationInput = document.getElementById("locationInput").value.trim();
        const destinationInput = document.getElementById("destinationInput").value.trim();
        const departureInput = document.getElementById("departureInput").value.trim();
  
        // Check if any of the input fields are empty
        if (locationInput === "" || destinationInput === "" || departureInput === "") {
            alert("Please fill out all fields in the form.");
        } else {
            // Proceed to the flight page with the search parameters
            window.location.href = `flights.php?locationInput=${locationInput}&destinationInput=${destinationInput}&departureInput=${departureInput}`;
        }
    });
  });
  
  // JavaScript for dropdown functionality
  document.addEventListener("DOMContentLoaded", function() {
    var dropdowns = document.getElementsByClassName("dropdown");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.getElementsByClassName("dropdown-content")[0];
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
  });
  
  function openDatePicker() {
    document.getElementById('departureInput').type = 'date';
    document.getElementById('departureInput').focus();
  }
  // Add click event listener to the logout link
  document.addEventListener("DOMContentLoaded", function() {
    // Get the logout link
    var logoutLink = document.querySelector('a.logout');
    
    // Add click event listener to the logout link
    logoutLink.addEventListener('click', function(event) {
        // Prevent default link behavior
        event.preventDefault(); 
        
        // Display a confirmation modal or notification
        if (confirm("Are you sure you want to log out?")) {
            // If the user confirms, redirect to logout.php
            window.location.href = "logout.php";
        }
    });
}); 