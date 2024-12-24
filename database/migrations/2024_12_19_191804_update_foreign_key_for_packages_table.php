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
        Schema::table('packages', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['category_id']);

            // Add the foreign key constraint with restrict delete
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('restrict');  // Prevent category deletion if packages exist
        });
    }

    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            // Drop the modified foreign key constraint
            $table->dropForeign(['category_id']);
        });
    }
};
