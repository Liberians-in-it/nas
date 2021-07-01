<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Address\Entities\Address;
use Modules\Address\Entities\Country;
use Modules\Address\Entities\Division;
use Modules\Address\Entities\Street;
use Modules\Address\Entities\DivisionType;

class SetupAddressTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createCountryTable();
        $this->createDivisionTypeTable();
        $this->createDivisionTable();
        $this->createStreetTable();
        $this->createAddressTable();
        $this->createAddressableTable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [
            'addresses',
            'streets',
            'divisions',
            'division_types',
            'countries',
            'addressables'
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }
    }

    // countries
    private function createCountryTable()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // division types
    private function createDivisionTypeTable()
    {
        Schema::create('division_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('level');

            $table->foreignIdFor(Country::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'level', 'country_id']);
        });
    }

    // devisions
    private function createDivisionTable()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);

            $table->foreignIdFor(Country::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(DivisionType::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Division::class)
                ->nullable()
                ->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    // street table
    private function createStreetTable()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('type', 255);

            $table->foreignIdFor(Division::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'division_id']);
        });
    }

    // addresses
    private function createAddressTable()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 255);
            $table->integer('postcode')->nullable();

            $table->foreignIdFor(Street::class)->constrained()->onDelete('cascade');

            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique([
                'street_id',
                'number',
                'postcode'
            ], 'uq_address');
        });
    }

    // addressables
    private function createAddressableTable()
    {
        Schema::create('addressables', function (Blueprint $table) {
            $table->foreignIdFor(Address::class);
            $table->morphs('addressable');
            $table->timestamps();
        });
    }
}
