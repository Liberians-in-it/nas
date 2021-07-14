<?php

namespace Modules\Address\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Address\Entities\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if (Country::count() <= 0) {
            Country::factory()
                ->count(1)
                ->create();
        }
    }
}
