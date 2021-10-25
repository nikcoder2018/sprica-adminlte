<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_informations', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->integer('number');
            $table->string('function');
            $table->double('salary');
            $table->string('tax');
            $table->date('entry_date');
            $table->string('vacation_entitlement');
            $table->string('street');
            $table->string('zipcode');
            $table->date('birthdate');
            $table->string('place_of_birth');
            $table->string('nationality');
            $table->string('st');
            $table->string('health_insurance');
            $table->string('living_date');
            $table->string('social_insurance_no');
            $table->string('st_id_nr');
            $table->string('driver_license');
            $table->string('vds_id');
            $table->string('bankname');
            $table->string('iban');
            $table->string('bic');
            $table->boolean('active');
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
        Schema::dropIfExists('user_informations');
    }
}
