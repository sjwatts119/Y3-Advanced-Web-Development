<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyListing extends Model
{
    use HasFactory;
    use SoftDeletes;

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
