<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationUserContactPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_contact_status', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('status')->nullable();
          $table->integer('user_id');
          $table->integer('organization_id');
          $table->string('notes')->nullable();
          $table->datetime('last_contact_date');
          $table->string('reason')->nullable();
          $table->string('privacy_level')->default('all');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organization_contact_status');
    }
}
