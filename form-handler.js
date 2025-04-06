document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        social: document.getElementById('social').value,
        options: document.getElementById('options').value
    };

    fetch('https://script.google.com/macros/s/AKfycbyFQTE8QpVeEoaFMRFTHJF51ea30ka2jefKgtTTfBq5GN3p-4z7dTk1biW5fHh6GcpH/exec', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Your message has been sent successfully!');
            document.getElementById('contactForm').reset(); // Reset the form
        } else {
            alert('Sorry, something went wrong. Please try again later.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Sorry, something went wrong. Please try again later.');
    });
});