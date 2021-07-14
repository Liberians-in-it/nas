<?php

namespace Modules\Address\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Address\Entities\Country;
use Modules\Address\Entities\Division;
use Modules\Address\Entities\DivisionType;

class DivisionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if(DivisionType::count() <= 0) {
            $country = Country::first();

            $level = 1;

            // county
            $county = new DivisionType();
            $county->name = 'county';
            $county->level = $level;
            $county->country()->associate($country);

            $county->save();
            $level++;


            // District
            $district = new DivisionType();
            $district->name = 'district';
            $district->level = $level;
            $district->country()->associate($country);
            $district->save();
            $level++;

            // City
            $city = new DivisionType();
            $city->name = 'city';
            $city->level = $level;
            $city->country()->associate($country);
            $city->save();
            $level++;

            // town
            $town = new DivisionType();
            $town->name = 'town';
            $town->level = $level;
            $town->country()->associate($country);
            $town->save();
            $level++;

            // vallege
            $vallege = new DivisionType();
            $vallege->name = 'vallege';
            $vallege->level = $level;
            $vallege->country()->associate($country);
            $vallege->save();

        }

    }
}
