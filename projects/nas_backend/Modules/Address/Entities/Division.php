<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;

    protected $with = [
        'parent',
        'divisionType'
    ];

    protected $fillable = [
        'name'
    ];

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\DivisionFactory::new();
    }

    public function DivisionType(): BelongsTo
    {
        return $this->belongsTo(DivisionType::class);
    }

    public function streets(): HasMany
    {
        return  $this->hasMany(Street::class);
    }

    public function parent(): BelongsTo
    {
       return $this->belongsTo(self::class, 'division_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class);
    }
}
