<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'bookings';

    // Fillable fields for mass assignment
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'people', 
        'destination', 
        'booking_date',
        'package_id',  // Add package_id here to allow mass assignment
    ];

    /**
     * Define the relationship with the Package model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);  // A booking belongs to one package
    }
}

