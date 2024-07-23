// Get the form element with the class 'form'
const form = document.querySelector('.form form');

// Get the submit button inside the form
const submitBtn = form.querySelector('input[type="submit"]');

// Get elements for displaying error messages
const errorTxt = document.querySelector('.error');
const error = document.querySelector('.error-container');

// Prevent the default form submission when the form is submitted
form.onsubmit = (e) => {
    e.preventDefault(); // Use lowercase 'preventDefault', not 'preventdefault'
}

// Attach a click event listener to the submit button
submitBtn.onclick = () => { // Corrected the event binding syntax
    // Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();
    
    // Set up the HTTP POST request
    xhr.open("POST", "/Php/signup.php", true); // Removed the extra comma before the path
    
    // Define the callback function to handle the response
    xhr.onload = () => {
        if (xhr.status === 200) {
            // Get the response data
            let data = xhr.responseText; // Use 'responseText' to get the response data
            
            // Check if the response is "Success"
            if (data === "Success") {
                // Redirect to the verify.php page on success
                location.href = "./verify.php";
            } else {
                // Display the error message if registration fails
                errorTxt.textContent = data;
                error.style.display = "block";
            }
        }
    }
    
    // Create a FormData object from the form
    let formData = new FormData(form);
    
    // Send the form data to the server
    xhr.send(formData); // Use 'formData' (variable) instead of 'FormData' (constructor)
}

// Add an event listener to the form with the ID "registrationForm"
document.getElementById("registrationForm").addEventListener("submit", function(event) {
    // Prevent the default form submission
    event.preventDefault();
    
    // Perform any form validation here if needed

    // Submit the form
    this.submit();

    // Redirect to the specified URL after form submission
    window.location.href = "../php/carpediem.php";
});
