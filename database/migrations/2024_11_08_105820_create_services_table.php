<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('services', function (Blueprint $table) {
        $table->id();                          // ID column (primary key)
        $table->string('name');                // Name of the service
        $table->string('logo')->nullable();    // Logo URL or file path (nullable)
        $table->string('slug')->unique();      // Slug for the service (unique)
        $table->boolean('status')->default(1); // Status (default to active)
        $table->timestamps();                  // Created_at and updated_at columns
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};


