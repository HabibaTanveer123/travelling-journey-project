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
        case 'italy':
            window.location.href = '/details-italy';
            break;
        case 'dubai':
            window.location.href = '/details-uae';
            break;
        case 'uae':
            window.location.href = '/details-uae';
            break;
        case 'uk':
            window.location.href = '/details-uk';
            break;
        case 'london':
                window.location.href = '/details-uk';
                break;
        case 'malaysia':
            window.location.href = '/details-malaysia';
            break;
        case 'pakistan':
            window.location.href = '/details-pakistan';
            break;
        case 'usa':
            window.location.href = '/details-usa';
            break;
        case 'america':
            window.location.href = '/details-usa';
            break;
        default:
            alert('Page not found'); // Alert user if the page is not found
    }
}