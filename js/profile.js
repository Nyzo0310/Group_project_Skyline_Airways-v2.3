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

// Function to toggle the visibility of the edit profile container
function toggleEditProfileContainer() {
    var editContainer = document.querySelector('.edit-container');
    if (editContainer) {
        editContainer.style.display = editContainer.style.display === 'none' ? 'block' : 'none';
    } else {
        console.error('Edit container not found.');
    }
}

// Function to close the edit profile container
function closeEditProfile() {
    var editContainer = document.querySelector('.edit-container');
    if (editContainer) {
        editContainer.style.display = 'none';
    } else {
        console.error('Edit container not found.');
    }
}

// Event listener for the "Edit Profile" button click
document.getElementById('editProfileBtn').addEventListener('click', function() {
    toggleEditProfileContainer();
});

// Event listener for the close button (X) inside the edit container
document.querySelector('.close-btn').addEventListener('click', function() {
    closeEditProfile();
});

// Event listener to toggle the edit container when clicking the overlay
document.getElementById('overlay').addEventListener('click', function(event) {
    // Check if the target of the click is the overlay itself, not its children
    if (event.target === this) {
        toggleEditProfileContainer();
    }
});

// Event listener to close the edit container when clicking outside of it
document.addEventListener('click', function(event) {
    var editContainer = document.querySelector('.edit-container');
    if (editContainer && !editContainer.contains(event.target) && event.target !== document.getElementById('editProfileBtn')) {
        editContainer.style.display = 'none';
    }
});

// Check input fields on page load
checkFields();

// Check input fields on change
document.querySelectorAll('input[readonly]').forEach(input => {
    input.addEventListener('change', checkFields);
});

function checkFields() { 
    const dob = document.getElementById('BDate').value.trim();
    const age = document.getElementById('Age').value.trim();
    const gender = document.getElementById('Gender').value.trim();
    const status = document.getElementById('Status').value.trim();
    const phone = document.getElementById('Phonenumber').value.trim();
    const nationality = document.getElementById('Nationality').value.trim();

    toggleAsterisk(dob, 'birthdateAsterisk');
    toggleAsterisk(age, 'ageAsterisk');
    toggleAsterisk(gender, 'genderAsterisk');
    toggleAsterisk(status, 'statusAsterisk');
    toggleAsterisk(phone, 'phoneAsterisk');
    toggleAsterisk(nationality, 'nationalityAsterisk');
}

function toggleAsterisk(value, asteriskId) {
    const asterisk = document.getElementById(asteriskId);
    if (value === '') {
        asterisk.style.display = 'inline'; // Show asterisk
    } else {
        asterisk.style.display = 'none'; // Hide asterisk
    }
}
