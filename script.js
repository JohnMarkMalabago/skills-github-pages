document.getElementById('CiteRegistrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(el => el.textContent = '');

    let isValid = true;

    // First Name validation
    const firstName = document.getElementById('firstName').value.trim();
    const firstNameRegex = /^[A-Za-z\s]+$/;
    if (firstName === '') {
        document.getElementById('firstNameError').textContent = 'First Name is required.';
        isValid = false;
    } else if (!firstNameRegex.test(firstName)) {
        document.getElementById('firstNameError').textContent = 'First Name can only contain letters and spaces.';
        isValid = false;
    }

    // Last Name validation
    const lastName = document.getElementById('lastName').value.trim();
    const lastNameRegex = /^[A-Za-z\s]+$/;
    if (lastName === '') {
        document.getElementById('lastNameError').textContent = 'Last Name is required.';
        isValid = false;
    } else if (!lastNameRegex.test(lastName)) {
        document.getElementById('lastNameError').textContent = 'Last Name can only contain letters and spaces.';
        isValid = false;
    }

    // Contact Number validation
    const contactNo = document.getElementById('contactNo').value.trim();
    const contactNoRegex = /^09\d{9}$/;
    if (contactNo === '') {
        document.getElementById('contactNoError').textContent = 'Contact Number is required.';
        isValid = false;
    } else if (!contactNoRegex.test(contactNo)) {
        document.getElementById('contactNoError').textContent = 'Contact Number must be 11 digits long and start with 09.';
        isValid = false;
    }

    // Batch validation
    const batch = document.getElementById('batch').value;
    if (batch === '') {
        document.getElementById('batchError').textContent = 'Please select a batch.';
        isValid = false;
    }

    // Email validation
    const email = document.getElementById('email').value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required.';
        isValid = false;
    } else if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        isValid = false;
    }

    if (isValid) {
        alert('Form submitted successfully!');
    }
});