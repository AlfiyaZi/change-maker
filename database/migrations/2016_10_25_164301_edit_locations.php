<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function ($table) {
            $table->dropColumn('address');
            $table->string('street_address1')->nullable();
            $table->string('street_address2')->nullable();
            $table->string('street_address3')->nullable();
            $table->string('geocode_string')->nullable();
            $table->string('directions')->nullable();
            $table->string('country')->nullable();
            $table->string('name')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('region')->nullable()->change();
            $table->renameColumn('postalCode', 'postal_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
