<x-web-layout>
    <body class="body">
        <div class="bg-image">
            <div class="container my-5">
                <div class="itinerary-container">
                    <h2 class="text-center mb-4">Italy Tour - 7-Day</h2>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/paris.jpg" class="card-img-top" alt="Paris" style="height: 200px; object-fit: fill;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/italy2.jpg" class="card-img-top" alt="Rome" style="height: 200px; object-fit: fill;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/italy3.jpg" class="card-img-top" alt="Venice" style="height: 200px; object-fit: fill;">
                            </div>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Day 1:</strong> Arrive in Rome, visit the Colosseum and Roman Forum.</li>
                        <li class="list-group-item"><strong>Day 2:</strong> Explore Vatican City, St. Peter's Basilica, and the Vatican Museums.</li>
                        <li class="list-group-item"><strong>Day 3:</strong> Take a train to Florence, visit the Uffizi Gallery and Ponte Vecchio.</li>
                        <li class="list-group-item"><strong>Day 4:</strong> Day trip to Pisa to see the Leaning Tower.</li>
                        <li class="list-group-item"><strong>Day 5:</strong> Travel to Venice, explore canals and St. Mark's Square.</li>
                        <li class="list-group-item"><strong>Day 6:</strong> Travel to Paris and see the Eiffel Tower.</li>
                        <li class="list-group-item"><strong>Day 7:</strong> Departure from Paris airport.</li>
                    </ul>
                    <a href="{{ route('packages') }}" class="btn btn-secondary mt-4">Back to Packages</a>
                </div>
            </div>
        </div>
    </body>
</x-web-layout>
