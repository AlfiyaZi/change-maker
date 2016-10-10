<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->nullable();
            $table->string('ein')->nullable();
            $table->string('avatar')->nullable();
            $table->string('backgroundImage')->nullable();
            $table->text('description');
            $table->string('address');
            $table->string('city');
            $table->string('region');
            $table->string('postalCode');
            $table->string('country');
            $table->string('missionStatement')->nullable();
            $table->string('phone')->nullable();
            $table->string('organizationURL')->nullable();
            $table->string('donateURL')->nullable();
            $table->integer('is_verified')->default(0);
            $table->integer('is_charitable')->default(0);
            $table->integer('is_public')->default(1);
            $table->string('data_source')->default('all for good');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organizations');
    }
}
