<?php

namespace Modules\Address\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Address\Entities\Division;
use Modules\Address\Entities\DivisionType;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if (Division::count() <= 0) {

            DivisionType::orderBy('level')->get()->each(function ($type) {
                $total = 1;
                $limit = ($type->level <= 1) ? 13 : 100;


                while ($total <= $limit) {
                   $parent = null;
                    if ($type->level > 1) {
                        $parentType = DivisionType::where('level', '<', $type->level)->inRandomOrder()->first();
                        $parent = Division::where('division_type_id', $parentType->id)->inRandomOrder()->first();

                    }

                    $division = new Division();
                    $division->name = "{$total} {$type->name}";
                    $division->country()->associate($type->country);
                    $division->divisionType()->associate($type);

                    if ($parent) {
                        $division->parent()->associate($parent);
                    }

                    $division->save();

                    $total++;
                }
            });
        }
    }
}
