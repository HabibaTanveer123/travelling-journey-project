<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';

    // Fillable fields for mass assignment
    protected $fillable = [
        'name',
        'destination',
        'description',
        'images',
        'itinerary',
    ];

    // Cast images and itinerary to arrays
    protected $casts = [
        'images' => 'array',
        'itinerary' => 'array',
    ];

    /**
     * Define the relationship with the Booking model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);  // A package has many bookings
    }
}
