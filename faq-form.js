<script>
document.querySelector('form[name="FAQ"]').onsubmit = function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Create the FormData object
    const formData = new FormData(this);

    // Use fetch to submit the form data to the PHP script
    fetch('send-email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Show a message based on the response
    })
    .catch(error => {
        console.error('Error:', error);
    });
};
</script>
