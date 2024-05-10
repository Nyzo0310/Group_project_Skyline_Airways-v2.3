   // Check input fields on page load
   checkFields();

   // Check input fields on change
   document.querySelectorAll('input[readonly]').forEach(input => {
       input.addEventListener('change', checkFields);
   });

   function checkFields() {
       const age = document.getElementById('Age').value.trim();
       const gender = document.getElementById('Gender').value.trim();
       const status = document.getElementById('Status').value.trim();
       const phone = document.getElementById('Phonenumber').value.trim();
       const nationality = document.getElementById('Nationality').value.trim();

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
   // Example JavaScript to trigger the animation
document.querySelector('.container').classList.add('animate-left');
