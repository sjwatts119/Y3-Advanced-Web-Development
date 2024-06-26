<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PropertyListing extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public $casts = [
        'attributes' => 'array',
        'reviews' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'property',
        'local_area',
        'accommodation',
        'reviews',
        'sleeps',
        'location',
        'attributes',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function friendlyDescription(): string{
        return Str::limit(strip_tags($this->property), 150);
    }
}
