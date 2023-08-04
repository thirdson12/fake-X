<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chirp extends Model
{

    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];
    protected $fillable = [
        'message',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
