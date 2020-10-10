<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('address_id');
            $table->bigInteger('client_id')->unsigned();
            $table->string('street', 255);
            $table->string('country', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('street_number', 255);
            $table->string('complement', 255)->nullable();
            $table->string('neighborhood', 255);
            $table->string('cep', 9);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
