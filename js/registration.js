//Location
function display_province(regCode) {
    $.ajax({
        url: './model/ph_address.php',
        type: 'POST',
        data: {
            'type': 'region',
            'post_code': regCode
        },
        success: function (response) {
            $('#inp_province').html(response);
        }
    });

}

function display_citymun(provCode) {
    $.ajax({
        url: './model/ph_address.php',
        type: 'POST',
        data: {
            'type': 'province',
            'post_code': provCode
        },
        success: function (response) {
            $('#inp_citymun').html(response);
        }
    });

}

function display_brgy(citymunCode) {
    $.ajax({
        url: './model/ph_address.php',
        type: 'POST',
        data: {
            'type': 'citymun',
            'post_code': citymunCode
        },
        success: function (response) {
            $('#inp_brgy').html(response);
        }
    });

}
// Function to validate password
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
        alert("Passwords do not match");
        document.getElementById("password").value = "";
        document.getElementById("confirm_password").value = "";
        return false;
    }
    return true;
}

function previewImage(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(event) {
        var imgElement = document.getElementById('imagePreview');
        imgElement.src = event.target.result;
        imgElement.style.display = 'block';
    }

    reader.readAsDataURL(file);
}

// Function to show notifications
function showNotification(message, isError) {
    var notification = document.getElementById("notification");
    notification.innerHTML = message;
    notification.style.display = "block";
    notification.style.backgroundColor = isError ? "#ff6666" : "#66ff66"; // Red for errors, green for success
    setTimeout(function () {
        hideNotification();
    }, 3000);
}

// Function to hide notifications
function hideNotification() {
    var notification = document.getElementById("notification");
    if (notification) {
        notification.style.display = "none";
    }
}

// Function to hide notification on click
function hideNotificationOnClick() {
    hideNotification(); 
}

var inputFields = document.querySelectorAll('input');
inputFields.forEach(function(input) {
    input.addEventListener('click', hideNotificationOnClick);
});

// Function to submit form
function submitForm() {
    hideNotification();
    return true;
}

// Document ready function
$(document).ready(function () {
    $('#registrationForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'regFunction.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log('Received data:', data); // Log the received data
                try {
                    var response = JSON.parse(data);
                    if (response.success) {
                        // Registration successful
                        showNotification(response.message, false); // Pass false for success
                        setTimeout(function() {
                            // Redirect to registration page without any error parameter
                            window.location.href = 'registration.php';
                        }, 3000); // Wait for 3 seconds before redirecting (adjust as needed)
                    } else {
                        // Registration failed, display error message
                        showNotification(response.message, true); // Pass true for error
                    }
                } catch (error) {
                    // Log the error and response for debugging
                    console.error('Error parsing JSON response:', error);
                    console.log('Response from server:', data);
                    // Display a generic error message
                    alert('An error occurred. Please try again later.');
                }
            },
            error: function () {
                alert('Error occurred. Please try again later.');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});