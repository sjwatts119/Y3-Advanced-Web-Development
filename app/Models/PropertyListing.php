<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PropertyListing extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $casts = [
        'attributes' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
