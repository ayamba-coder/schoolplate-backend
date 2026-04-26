<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicdonations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('institution_id')->nullable()->constrained('users')->cascadeOnDelete(); // recipient (optional)
            $table->decimal('amount', 12, 2);
            $table->string('payment_channel');
            $table->timestamps();
        });

        Schema::create('privatedonations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('class_id')->nullable()->constrained('users')->cascadeOnDelete(); // recipient (optional)
            $table->decimal('amount', 12, 2);
            $table->string('payment_channel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
