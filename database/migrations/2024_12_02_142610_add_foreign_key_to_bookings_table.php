<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Ensure the package_id column is set as a foreign key
            $table->foreign('package_id')
                  ->references('id') // Reference the 'id' column in the 'packages' table
                  ->on('packages') // The table that 'package_id' references
                  ->onDelete('cascade'); // Cascade delete when the related package is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['package_id']);
        });
    }
}
