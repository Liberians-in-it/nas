<?php
namespace Modules\Address\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostcodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Address\Entities\Postcode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

