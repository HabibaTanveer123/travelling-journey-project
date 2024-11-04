<x-web-layout>
<!DOCTYPE html>
<html lang="en">
<body class="body">

    <!-- Background and Container -->
    <div class="bg-image" style="height: auto; min-height: 100vh;"> <!-- Background image with full viewport height -->
        <div class="container my-5"> <!-- Bootstrap container with vertical margins -->

            <!-- About Us Section -->
            <h2 class="text-center mb-4">About Us</h2> <!-- Centered heading with bottom margin -->
            <p class="text-center mx-auto" style="max-width: 600px;"> <!-- Centered paragraph with max width for better readability -->
                We are a dedicated travel agency passionate about helping you explore the world's best destinations.
                From breathtaking landscapes to vibrant cities, we offer customized tours that make each journey
                unforgettable. Let us guide you to your next adventure.
            </p>

            <!-- Contact Us Form -->
            <h2 class="text-center mb-4">Contact Us</h2> <!-- Centered heading for the contact section -->
            <div class="form-container" style="margin-top:20%;"> <!-- Container for the form, with top margin for spacing -->
                <form class="text-center"> <!-- Centered form layout -->

                    <!-- Name Field -->
                    <div class="mb-3"> <!-- mb-3 adds margin-bottom for spacing -->
                        <label for="name" class="form-label">Full Name</label> <!-- Label for the name input -->
                        <input type="text" class="form-control" id="name" name="name" required> <!-- Styled input field for name -->
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3"> <!-- mb-3 adds margin-bottom for spacing -->
                        <label for="email" class="form-label">Email Address</label> <!-- Label for the email input -->
                        <input type="email" class="form-control" id="email" name="email" required> <!-- Styled input field for email -->
                    </div>

                    <!-- Message Field -->
                    <div class="mb-3"> <!-- mb-3 adds margin-bottom for spacing -->
                        <label for="message" class="form-label">Your Message</label> <!-- Label for the message textarea -->
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea> <!-- Styled textarea for message -->
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary d-flex justify-content-center">Send Message</button> <!-- Primary styled button, flexbox for center alignment -->
                </form>
            </div>
        </div>
    </div>

</body>
</html>
</x-web-layout>
