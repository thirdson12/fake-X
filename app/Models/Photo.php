<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'filenames'
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
