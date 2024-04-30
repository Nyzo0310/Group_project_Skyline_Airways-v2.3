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

// Function to show the notification
function showNotification(message) {
    var notification = document.getElementById("notification");
    notification.innerHTML = message; 
    notification.style.display = "block";
    setTimeout(function(){
        hideNotification();
    }, 3000); 
}

function hideNotification() {
    var notification = document.getElementById("notification");
    if (notification) {
        notification.style.display = "none";
    }
}

function submitForm() {
 
    hideNotification();
    return true;
}

function hideNotificationOnClick() {
    hideNotification(); 
}

var inputFields = document.querySelectorAll('input');
inputFields.forEach(function(input) {
    input.addEventListener('click', hideNotificationOnClick);
});


