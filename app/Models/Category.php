<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Allow mass assignment for the 'name' field
    protected $fillable = ['name'];

    // Define the one-to-many relationship with Package
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
