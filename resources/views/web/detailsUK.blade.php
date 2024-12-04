<x-web-layout>
    <body class="body">
        <div class="bg-image">
            <div class="container my-5">
                <div class="itinerary-container">
                    <h2 class="text-center mb-4">UK Tour - 7-Day</h2>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/london.webp" class="card-img-top" alt="Big-Ben" style="height: 200px; object-fit: fill;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/uk.jpg" class="card-img-top" alt="Buckingham-Palace" style="height: 200px; object-fit: fill;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/uk2.webp" class="card-img-top" alt="Oxford" style="height: 200px; object-fit: fill;">
                            </div>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Day 1:</strong> Arrive in London, explore the Tower of London and Tower Bridge.</li>
                        <li class="list-group-item"><strong>Day 2:</strong> Visit Buckingham Palace and the Houses of Parliament.</li>
                        <li class="list-group-item"><strong>Day 3:</strong> Take a day trip to Stonehenge and Bath.</li>
                        <li class="list-group-item"><strong>Day 4:</strong> Travel to Oxford, visit the university, and explore the city.</li>
                        <li class="list-group-item"><strong>Day 5:</strong> Visit Stratford-upon-Avon, the birthplace of Shakespeare.</li>
                        <li class="list-group-item"><strong>Day 6:</strong> Explore the Cotswolds, enjoy scenic villages and local culture.</li>
                        <li class="list-group-item"><strong>Day 7:</strong> Return to London and depart from there.</li>
                    </ul>
                    <a href="{{ route('packages') }}" class="btn btn-secondary mt-4">Back to Packages</a>
                </div>
            </div>
        </div>
    </body>
</x-web-layout>
