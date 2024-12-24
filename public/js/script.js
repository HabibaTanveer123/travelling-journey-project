// public/js/script.js

document.getElementById('searchBar').addEventListener('input', function () {
    let query = this.value.trim();

    // Perform search only if 1 character is entered
    if (query.length >= 1) {
        fetch(`/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                let results = '';

                // Display packages if found
                if (data.packages.length > 0) {
                    data.packages.forEach(package => {
                        results += `<li class="list-group-item"><a href="/packages/${package.id}">${package.name}</a></li>`;
                    });
                }

                // Display categories if found
                if (data.categories.length > 0) {
                    data.categories.forEach(category => {
                        results += `<li class="list-group-item" data-category-id="${category.id}">${category.name}</li>`;
                    });
                }

                // If no results, show a "No results found" message
                if (results === '') {
                    results = '<li class="list-group-item">No results found</li>';
                }

                // Display the results dropdown
                const searchResults = document.getElementById('searchResults');
                searchResults.innerHTML = results;
                searchResults.style.display = results ? 'block' : 'none';
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
    } else {
        document.getElementById('searchResults').style.display = 'none';
    }
});
