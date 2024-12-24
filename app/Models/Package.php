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
        'category_id'
    ];

    // Cast images and itinerary to arrays
    protected $casts = [
        'images' => 'array',
        'itinerary' => 'array',
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
