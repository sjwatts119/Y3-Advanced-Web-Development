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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            //we need foreign key to PropertyListing, start date, end date, user's name, user's email, user's phone number (nullable), and a message
            $table->foreignId('property_listing_id')->constrained('property_listings')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone_number')->nullable();
            $table->text('message');
            $table->enum('status', ['requested', 'approved', 'rejected'])->default('requested');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
