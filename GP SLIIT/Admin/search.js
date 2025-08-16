document.addEventListener("DOMContentLoaded", function() {
    const searchButton = document.getElementById("search-button");
    const searchInput = document.getElementById("search-input");

    searchButton.addEventListener("click", function() {
        const query = searchInput.value.trim();
        if (query) {
            
            window.location.href = `search.php?q=${encodeURIComponent(query)}`;
        } else {
            alert("Please enter a search term.");
        }
    });

   
    searchInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            searchButton.click();
        }
    });
});
