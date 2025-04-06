document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        social: document.getElementById('social').value,
        options: document.getElementById('options').value
    };

    fetch('https://script.google.com/macros/s/AKfycbxTH-rHdr6bVPXemcwsvD_tzLCqYtS0W_ki0rPJYToRG29YRs6NfW2b6CCD9kPgjaGP/exec', {
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
