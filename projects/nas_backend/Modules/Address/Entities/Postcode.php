<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Postcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code'
    ];

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\PostcodeFactory::new();
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}

