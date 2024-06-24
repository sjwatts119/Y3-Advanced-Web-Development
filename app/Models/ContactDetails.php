<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'details_name',
        'address',
        'phone',
        'email',
        'is_active',
    ];

    public static function getContactDetails()
    {
        if(self::where('is_active', true)->exists()){
            return self::where('is_active', true)->first();
        }
        else{
            //we should make a new contact details object with default details if no active contact details is found in the model
            return new self([
                'details_name' => 'Default Contact Details',
                'address' => 'Default Address',
                'phone' => 'Default Phone',
                'email' => 'Default Email',
            ]);
        }
    }
}
