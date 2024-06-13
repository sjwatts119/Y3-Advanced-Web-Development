<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_listing_id',
        'start_date',
        'end_date',
        'user_name',
        'user_email',
        'user_phone_number',
        'message',
    ];

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getStartDateAttribute($value) : String
    {
        return DateTime::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function getEndDateAttribute($value) : String
    {
        return DateTime::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function propertyListing(): BelongsTo{
        return $this->belongsTo(PropertyListing::class);
    }
}
