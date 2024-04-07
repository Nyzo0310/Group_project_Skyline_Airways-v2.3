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