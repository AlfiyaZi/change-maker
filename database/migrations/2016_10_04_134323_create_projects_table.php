<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('organization_id')->nullable();
            $table->text('description');
            $table->integer('rsvpCount')->nullable();
            $table->integer('rsvpMax')->nullable();
            $table->integer('minimumAge')->nullable();
            $table->char('sexRestrictedTo')->nullable();
            $table->boolean('backgroundCheckRequired')->default(0);
            $table->string('privacy')->default('private');
            $table->string('status')->default('draft');
            $table->integer('user_id');
            $table->integer('is_virtual')->default(0);
            $table->index('user_id');
            $table->timestamps();
        });
        Schema::create('project_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('user_id');
            $table->string('role')->default('volunteer');
            $table->index('project_id');
            $table->index('user_id');
            $table->integer('rating')->nullable();
            $table->index(['project_id','user_id']);
            $table->timestamps();
        });
        Schema::create('story_emotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->integer('user_id');
            $table->string('emotion')->default('like');
            $table->index('story_id');
            $table->index('user_id');
            $table->index(['story_id','user_id']);
            $table->timestamps();
        });
        Schema::create('durations', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start');
            $table->datetime('end');
            $table->string('timezone');
            $table->integer('project_id')->unsigned();

            $table->index('project_id');
            $table->timestamps();
        });
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('region');
            $table->string('postalCode')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();

            $table->index('project_id');
            $table->integer('project_id')->unsigned();
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
        Schema::drop('projects');
        Schema::drop('durations');
        Schema::drop('locations');
        Schema::drop('project_user');
        Schema::drop('story_user');

    }
}
