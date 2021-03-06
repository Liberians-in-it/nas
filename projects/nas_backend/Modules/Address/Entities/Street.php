<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Street extends Model
{
    use HasFactory;

    protected $with = [
        'division'
    ];

    protected $fillable = [
        'name'
    ];

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\StreetFactory::new();
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

}
