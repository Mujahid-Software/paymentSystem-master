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
        Schema::create('marchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identity_number')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('iban')->unique();
            $table->string('email')->unique();
            $table->string('commercial_registration_number')->unique();
            $table->string('commercial_registration_file')->nullable();
            $table->string('tax_number')->unique();
            $table->string('tax_registration_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marchants');
    }
};
