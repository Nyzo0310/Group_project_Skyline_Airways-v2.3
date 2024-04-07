document.getElementById("username").addEventListener("input", clearErrorMessage);
        document.getElementById("password").addEventListener("input", clearErrorMessage);

        function clearErrorMessage() {
            var errorMessage = document.getElementById("errorMessage");
            if (errorMessage) {
                errorMessage.textContent = ""; // Clear the error message
            }
        }
        
        // JavaScript code to toggle password visibility
        document.getElementById("show-password").addEventListener("change", function() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });  