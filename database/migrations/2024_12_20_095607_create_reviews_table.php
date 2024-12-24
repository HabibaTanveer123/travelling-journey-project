<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->text('review'); // To store the review text
        $table->string('image')->nullable(); // To store the image path (nullable because the image is optional)
        $table->timestamps(); // For created_at and updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
