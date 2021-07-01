<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $with = [
        'street'
    ];

    protected $fillable = [
        'number'
    ];

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\AddressFactory::new();
    }

    public function street(): BelongsTo
    {
        return $this->belongsTo(Street::class);
    }

    public function toAddressString()
    {
        $str = "{$this->number} {$this->street->name} \n\r";
        return $this->visit($str, $this->street);
    }

    protected function visit(string $str, $object): string
    {
        if ($object->parent || $object->division) {
            $name = $object->parent? $object->parent->name : $object->division->name;
            $str .= "{$name} \n\r";
            $str = $this->visit($str, $object->parent? $object->parent : $object->division);
        } else {
            $str .= "{$this->postcode} {$object->name} \n\r";
        }

        return $str;
    }
}
