<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contact_friends', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('name')->nullable();
          $table->string('uid')->nullable();
          $table->integer('contact_id');
          $table->string('provider')->nullable();
      });

      Schema::table('contacts', function ($table) {
          $table->string('name')->nullable();
          $table->string('image_url')->nullable();
          $table->string('location')->nullable();
          $table->string('uid')->nullable();
          $table->string('provider')->nullable();
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
