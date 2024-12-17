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
        Schema::create('transactions', function (Blueprint $table) {
        $table->id();                                    // ID column (primary key)
        $table->string('reference')->unique();           // Unique reference for the transaction
        $table->string('description')->nullable();       // Description of the transaction
        $table->unsignedBigInteger('service_id');        // Foreign key to Service model
        $table->decimal('amount', 15, 2);                // Transaction amount
        $table->decimal('balance_before', 15, 2);        // Balance before the transaction
        $table->decimal('balance_after', 15, 2);         // Balance after the transaction
        $table->string('status');                        // Status of the transaction
        $table->timestamps();                            // Created_at and updated_at columns

        // Add foreign key constraint (optional)
        $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
