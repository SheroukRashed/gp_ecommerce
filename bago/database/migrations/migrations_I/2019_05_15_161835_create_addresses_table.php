<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('formatted_address');
            $table->decimal('longitude',16,13);
            $table->decimal('latitude',16,13);
            $table->decimal('northeast_lng',16,13);
            $table->decimal('northeast_lat',16,13);
            $table->decimal('southwest_lng',16,13);
            $table->decimal('southwest_lat',16,13);
            $table->timestampsTz();
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
