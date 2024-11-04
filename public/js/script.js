function handleSearch(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    const query = document.getElementById('searchQuery').value.toLowerCase(); // Get and normalize the search query

    // Redirect based on the search query
    switch (query) {
        case 'home':
            window.location.href = '/'; // Redirect to Home page
            break;
        case 'booking':
            window.location.href = '/booking'; // Redirect to Booking page
            break;
        case 'packages':
            window.location.href = '/packages'; // Redirect to Packages page
            break;
        case 'memories':
            window.location.href = '/memories'; // Redirect to Memories page
            break;
        case 'contact us':
            window.location.href = '/contactUs'; // Redirect to Contact Us page
            break;
        default:
            alert('Page not found'); // Alert user if the page is not found
    }
}