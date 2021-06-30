<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Address\Entities\Address;
use Modules\Address\Entities\City;
use Modules\Address\Entities\Country;
use Modules\Address\Entities\County;
use Modules\Address\Entities\Postcode;
use Modules\Address\Entities\Street;
use Modules\Address\Entities\Suburb;

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
        $this->createCountyTable();
        $this->createCityTable();
        $this->createSuburbTable();
        $this->creatPostcodeTable();
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
            'suburbs',
            'cities',
            'postcodes',
            'counties',
            'countries',
            'addressables'
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }
    }

    // street table
    private function createStreetTable()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('type', 255);

            $table->foreignIdFor(Suburb::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'suburb_id']);
        });
    }


    // subburbs
    private function createSuburbTable()
    {
        Schema::create('suburbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);

            $table->foreignIdFor(City::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'city_id']);
        });
    }

    // cities
    private function createCityTable()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);

            $table->foreignIdFor(County::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'county_id']);
        });
    }

    // postcode
    private function creatPostcodeTable()
    {
        Schema::create('postcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');

            $table->foreignIdFor(County::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['code', 'county_id']);
        });
    }

    // counties
    private function createCountyTable()
    {
        Schema::create('counties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);

            $table->foreignIdFor(Country::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
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

    // addresses
    private function createAddressTable()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 255);

            $table->foreignIdFor(Street::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Suburb::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(City::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Postcode::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(County::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Country::class)->constrained()->onDelete('cascade');

            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique([
                'street_id',
                'suburb_id',
                'city_id',
                'county_id',
                'country_id'
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
