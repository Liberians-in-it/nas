<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\CountryFactory::new();
    }

    public function counties(): HasMany
    {
        return $this->hasMany(County::class);
    }

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }

    public function divisionTypes(): HasMany
    {
        return $this->hasMany(DivisionType::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
