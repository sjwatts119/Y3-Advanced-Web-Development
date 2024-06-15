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
        Schema::create('property_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('property');
            $table->text('local_area');
            $table->text('accommodation');
            $table->json('reviews');
            $table->string('slug')->unique();
            $table->integer('sleeps');
            $table->string('location');
            //we need an array of attributes for: Single Story, Multistory, Beach, Disability friendly, Family Friendly, Dog/Pets Allowed, Parking, Pool, Garden
            $table->json('attributes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_listings');
    }
};
