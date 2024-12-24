<x-web-layout>

<body class="body">

    <div class="bg-image"> <!-- Background container for the section -->
        <div class="container my-5"> <!-- Bootstrap container with vertical margins for spacing -->
            <h2 class="text-center mb-4">Memories from Our Travelers</h2> <!-- Centered heading for the section with bottom margin -->

            <!-- About Memories Section -->
            <div class="about-memories text-center mb-5"> <!-- Centered section for introductory text -->
                <p>We are honored to be part of these unforgettable journeys. Here are some experiences shared by our customers.</p> <!-- Description paragraph -->
            </div>

            <!-- Customer Reviews and Photos -->
            <div class="row"> <!-- Bootstrap row to organize customer memory cards -->

                @foreach ($reviews as $review) <!-- Loop through the reviews -->
                <div class="col-md-4 mb-4"> <!-- Bootstrap column for each review -->
                    <div class="card h-100"> <!-- Card component -->
                        @if ($review->image) <!-- Check if there's an image -->
                            <img src="{{ asset('storage/' . $review->image) }}" class="card-img-top" alt="Customer Memory" style="height: 200px; object-fit: fill;">
                        @endif
                        <div class="card-body"> <!-- Card body -->
                            <p class="card-text">{{ $review->review }}</p> <!-- Review text -->
                        </div>
                    </div>
                </div>
                @endforeach

            </div> <!-- End of the row -->

            <!-- Add a Review Section -->
            <div class="mt-5">
                <h3 class="text-center mb-4">Add Your Review</h3> <!-- Section heading -->
                <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data" class="text-center">
                    @csrf <!-- CSRF token for security -->

                    <!-- Text Review Input -->
                    <div class="mb-3">
                        <label for="review" class="form-label">Your Review</label>
                        <textarea id="review" name="review" class="form-control" rows="4" placeholder="Write your review here..." required></textarea>
                    </div>

                    <!-- Image Upload Input -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload an Image (optional)</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>

        </div> <!-- End of container -->
    </div> <!-- End of background image div -->

</body>

</x-web-layout>
