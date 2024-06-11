<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;



class Theme extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'company_name',
        'is_active',
        'is_default',
    ];

    public static function getTheme(): self
    {
        if(self::where('is_active', true)->exists()){
            return self::where('is_active', true)->first();
        }
        else{
            //we should make a new theme object with default company name and name if no active theme is found in the model
            return new self([
                'name' => 'Default Theme',
                'company_name' => 'Default Company',
            ]);
        }
    }
}
