document.getElementById('faqForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        message: document.getElementById('message').value
    };

    fetch('https://script.google.com/macros/s/AKfycbwB3HM094jR8xOnlRVGxj2oVFMSMJsXzaRMvqZDaxkhRgma4ue3zAIyoTbhkDB_JPBt/exec', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Your question has been submitted successfully!');
            document.getElementById('faqForm').reset(); // Reset the form
        } else {
            alert('Sorry, something went wrong. Please try again later.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Sorry, something went wrong. Please try again later.');
    });
});
});
