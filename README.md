Traveling Journey Website

Welcome to the Traveling Journey website! This platform provides users with a seamless experience to explore travel destinations, book tours, and share their travel memories.

Project Overview

The Traveling Journey website is a Laravel-based application designed to make travel planning easier and more enjoyable. Users can browse various travel packages, book tours, and view memories shared by other travelers. Admins have the ability to manage packages, categories, and bookings through a dedicated admin panel.

Features

User Features:

View and search for travel packages.

Book tours for specific destinations.

Explore travel memories shared by other users.

Contact the website for inquiries.

Admin Features:

Manage travel packages (add, update, delete).

Categorize packages by travel destination types.

View and manage user bookings.

Respond to user contact messages.

Setup Instructions

Prerequisites

PHP 8.0 or higher

Composer

Node.js and npm

Laravel 10 or higher

Installation Steps

Clone the repository:

git clone <repository_url>
cd traveling-journey

Install dependencies:

composer install
npm install

Set up environment variables:
Create a .env file and configure the following:

APP_NAME="Traveling Journey"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=traveling_journey
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email@example.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@example.com
MAIL_FROM_NAME="Traveling Journey"

Generate application key:

php artisan key:generate

Run migrations:

php artisan migrate

Seed the database (optional):

php artisan db:seed

Run the development server:

php artisan serve

Compile assets:

npm run dev

Usage Guide

User Workflow

Homepage:

Browse the homepage to explore featured travel packages.

Search Packages:

Use the search bar in the header to search for packages by name.

Filter by Categories:

On the packages page, use the category dropdown to filter packages by type.

Book a Package:

Select a package and click "Book Now" to fill out the booking form.

Memories Page:

View customer reviews and shared pictures from past trips.

Admin Workflow

Manage Packages:

Add, update, or delete packages via the admin panel.

Manage Categories:

Organize packages into categories for better user navigation.

View Bookings:

Access booking details and manage user reservations.

Contact Messages:

Respond to user inquiries submitted through the contact form.

Folder Structure

app/ - Application logic and controllers.

resources/views/ - Blade templates for the website.

public/ - Public assets such as images and compiled CSS/JS.

routes/web.php - Application routes.

database/ - Migration files and seeders.

Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

Enjoy planning your next adventure with Traveling Journey!