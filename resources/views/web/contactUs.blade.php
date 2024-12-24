<x-web-layout>
<body class="body">

    <!-- Background and Container -->
    <div class="bg-image" style="height: auto; min-height: 100vh;"> <!-- Background image with full viewport height -->
        <div class="container my-5"> <!-- Bootstrap container with vertical margins -->

            <!-- About Us Section -->
            <h2 class="text-center mb-4">About Us</h2>
            <p class="text-center mx-auto" style="max-width: 600px;">
                We are a dedicated travel agency passionate about helping you explore the world's best destinations.
                From breathtaking landscapes to vibrant cities, we offer customized tours that make each journey
                unforgettable. Let us guide you to your next adventure.
            </p>

            <!-- Contact Us Form -->
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="form-container"> <!-- Container for the form -->
                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="text-center"> <!-- Centered form layout -->
                    @csrf

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Message Field -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

</body>
</x-web-layout>
