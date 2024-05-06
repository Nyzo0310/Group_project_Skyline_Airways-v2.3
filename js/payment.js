function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup.style.display === 'block') {
        popup.style.display = 'none';
    } else {
        popup.style.display = 'block';
    }
}

// Event listener for GCash pay button click
document.getElementById('gcash-pay-button').addEventListener('click', function() {
    const mobileNumber = document.getElementById('mobile-number').value;
    togglePopup('gcash-popup'); // Close GCash popup after processing
});

// Event listener for PayPal login button click
document.getElementById('paypal-login-button').addEventListener('click', function() {
    const emailOrMobile = document.getElementById('email-or-mobile').value;
    const password = document.getElementById('password').value;
    togglePopup('paypal-popup'); // Close PayPal popup after processing
});

// Event listener for sign-in button click
document.getElementById('sign-in-button').addEventListener('click', function() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    togglePopup('sign-in-popup'); // Close Sign-in popup after processing
});
 