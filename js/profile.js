
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.querySelector(".edit-profile-button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
// Get the image container and the image element
var profilePictureContainer = document.getElementById('profile-picture-container');
var profilePicture = document.getElementById('profile-picture');

// Add a click event listener to the image container
profilePictureContainer.addEventListener('click', function() {
    // Toggle a class to indicate whether the image is zoomed or not
    profilePictureContainer.classList.toggle('zoomed');
});


