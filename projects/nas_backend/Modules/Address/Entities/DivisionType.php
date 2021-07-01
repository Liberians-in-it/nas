<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DivisionType extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\DivisionTypeFactory::new();
    }

    public function  scopeName(Builder $query, string $type): Builder
    {
        return $query->where('name', $type);
    }

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }
}
