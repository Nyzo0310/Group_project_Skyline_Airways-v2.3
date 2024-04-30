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
