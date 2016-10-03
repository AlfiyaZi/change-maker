<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id');
            $table->integer('user_id');
            $table->integer('duration');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->integer('certified_by');
            $table->integer('is_certified');
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
        Schema::drop('service_logs');
    }
}
