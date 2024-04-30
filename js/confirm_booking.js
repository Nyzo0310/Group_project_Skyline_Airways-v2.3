// Function to toggle pop-up visibility
function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup.style.display === "none" || popup.style.display === "") {
        popup.style.display = "block";
    } else {
        popup.style.display = "none";
    }
}

// Function to close pop-up upon successful login
function loginAndClosePopup(popupId) {
    // Simulate login process
    // Here, you can perform your login logic
    var emailOrMobile = '';
    var password = '';
    if (popupId === 'paypal-popup') {
        emailOrMobile = document.getElementById('paypal-email-or-mobile').value;
        password = document.getElementById('paypal-password').value;
        // Handle PayPal login here
        // Display a notification message
        alert("Logged in with PayPal successfully!");
    } else if (popupId === 'mastercard-popup') {
        emailOrMobile = document.getElementById('mastercard-username').value;
        password = document.getElementById('mastercard-password').value;
        // Handle Mastercard login here
        // Display a notification message
        alert("Logged in with Mastercard successfully!");
    } else if (popupId === 'gcash-popup') {
        // Handle GCash login here
        // Display a notification message
        alert("Logged in with GCash successfully!");
    }

    // Close the pop-up upon successful login
    togglePopup(popupId);
    // Enable the radio buttons after successful login
    enableRadioButtons();
}

// Function to validate input and perform login
function validateAndLogin(inputField1, inputField2, popupId) {
    var input1 = document.getElementById(inputField1).value;
    var input2 = document.getElementById(inputField2).value;

    if (!input1 || !input2) {
        alert("Please enter your information.");
        return;
    }

    // Perform login process
    loginAndClosePopup(popupId);
}

// Function to enable radio buttons
function enableRadioButtons() {
    var radioButtons = document.querySelectorAll('input[name="payment-method"]');
    for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].disabled = false;
    }
}

// Function to close pop-up and unselect radio button
function closePopupAndUnselectRadio(popupId, radioId) {
    togglePopup(popupId);
    document.getElementById(radioId).checked = false;
}

// Add event listener to close icon
var closeIcons = document.querySelectorAll('.close-icon');
closeIcons.forEach(function(closeIcon) {
    closeIcon.addEventListener('click', function() {
        var popupParent = this.parentElement;
        var popupId = popupParent.getAttribute('id');
        if (popupId) {
            var radioId = popupId.split('-')[0] + '-radio';
            closePopupAndUnselectRadio(popupId, radioId);
        }
    });
});

