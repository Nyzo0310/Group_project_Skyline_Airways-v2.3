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
    
    // Add click event listener to update buttons
    var updateButtons = document.querySelectorAll('.update-btn');
    updateButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the parent row of the clicked button
            var parentRow = this.closest('tr');
            
            // Implement update functionality here
            console.log('Update button clicked for row:', parentRow);
        });
    });
    
    // Add click event listener to delete buttons
    var deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the parent row of the clicked button
            var parentRow = this.closest('tr');
            
            // Ask for confirmation before deleting
            if (confirm("Are you sure you want to delete?")) {
                // Remove the parent row from the DOM
                parentRow.remove();
            }
        });
    });
});
