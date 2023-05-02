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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('gender',['male','female'])->nullable();
            $table->string('dob')->nullable();
            $table->longText('completeAddress')->nullable();
            $table->string('city')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('otp')->nullable();
            $table->string('regionId')->nullable();
            $table->string('emergencyContactName')->nullable();
            $table->string('emergencyContactRelation')->nullable();
            $table->string('emergencyContactNumber')->nullable();
            $table->string('bio')->nullable();
            $table->string('deviceIdentifire')->nullable();
            $table->string('deviceName')->nullable();
            $table->string('fcmToken')->nullable();
            $table->enum('role',['admin','user']);
            $table->enum('status',['active','blocked'])->default('active');
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
