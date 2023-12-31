<?php

namespace App\Models;

use App\Events\PewpewCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pewpew extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    protected $dispatchesEvents = [
        'created' => PewpewCreated::class
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
