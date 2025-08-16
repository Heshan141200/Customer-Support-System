document.addEventListener("DOMContentLoaded", function() {
    fetch('../HTML/footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('content').innerHTML = data;
        })
        .catch(error => console.error('Error loading navbar:', error));
});

