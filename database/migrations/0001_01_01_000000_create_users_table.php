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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('telephone')->unique();
            $table->enum('role', ["sudo", "admin", "student", "donor"]);
            $table->decimal(column: 'balance', total: 10, places: 2)->default(0.00)->nullable(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: "user_id")->constrained("users")->onDelete("cascade");
            $table->string('occupation')->nullable();
            $table->timestamps();
        });
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: "user_id")->constrained("users")->onDelete("cascade");
            $table->string('logo')->nullable()->unique()->nullable();
            $table->timestamps();
        });
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: "user_id")->constrained("users")->onDelete("cascade");
            $table->string('school')->nullable();
            $table->string('matricule')->nullable()->unique();
            $table->string('department')->nullable();
            $table->enum('verification_status', ['pending', 'approved', 'rejected'])->default("pending");
            $table->timestamp('account_verified_at')->nullable();
            $table->string('level')->nullable();
            $table->timestamps();

        });
        // Schema::create('restaurants', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId(column: "user_id")->constrained("users")->onDelete("cascade");
        //     $table->string('location');
        //     $table->enum('verification_status', ['pending', 'approved', 'rejected'])->default("pending");
        //     $table->timestamp('account_verified_at')->nullable();
        //     $table->timestamps();

        // });
        Schema::create('kyc_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('type');
            $table->string('path');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('donors');
        Schema::dropIfExists('students');
        Schema::dropIfExists('restaurants');
        Schema::dropIfExists('kyc_docs');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
