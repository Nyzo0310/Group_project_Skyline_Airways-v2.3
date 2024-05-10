
       document.getElementById('editProfileBtn').addEventListener('click', function() {
            // Toggle visibility of the edit container
            var editContainer = document.querySelector('.edit-container');
            editContainer.style.display = editContainer.style.display === 'none' ? 'block' : 'none';

        });

        function display_province(regCode) {
            $.ajax({
                url: './model/ph_address.php',
                type: 'POST',
                data: {
                    'type': 'region',
                    'post_code': regCode
                },
                success: function (response) {
                    $('#EditProvince').html(response);
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
                    $('#EditCitymun').html(response);
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
                    $('#EditBrgy').html(response);
                }
            });
        }
        
// Get the image container and the image element
var profilePictureContainer = document.getElementById('profile-picture-container');
var profilePicture = document.getElementById('profile-picture');

// Add a click event listener to the image container
profilePictureContainer.addEventListener('click', function() {
    // Toggle a class to indicate whether the image is zoomed or not
    profilePictureContainer.classList.toggle('zoomed');
});
document.addEventListener('DOMContentLoaded', function() {
        var ageInput = document.getElementById('Age');
        var genderInput = document.getElementById('gender');
        var statusInput = document.getElementById('status');
        var phoneInput = document.getElementById('Phonenumber');

        function toggleAsterisk(input, asteriskId) {
            var asterisk = document.getElementById(asteriskId);
            if (input.value.trim() === '') {
                asterisk.style.display = 'inline'; // Show asterisk if input is empty
            } else {
                asterisk.style.display = 'none'; // Hide asterisk if input is not empty
            }
        }

        ageInput.addEventListener('input', function() {
            toggleAsterisk(this, 'ageAsterisk');
        });

        genderInput.addEventListener('input', function() {
            toggleAsterisk(this, 'genderAsterisk');
        });

        statusInput.addEventListener('input', function() {
            toggleAsterisk(this, 'statusAsterisk');
        });

        phoneInput.addEventListener('input', function() {
            toggleAsterisk(this, 'phoneAsterisk');
        });
    });
