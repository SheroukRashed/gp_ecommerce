<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->decimal('rating', 3, 2);
            $table->decimal('delivery_fees', 3, 2);
            $table->enum('status', ['Accepted', 'Ongoing', 'delivered']);
            $table->enum('payment_type', ['Cash', 'Credit']);
            $table->dateTimeTz('deliverd_at');
            $table->decimal('price_per_order', 6, 2);
            $table->unsignedBigInteger('destination_address_id');
            $table->foreign('destination_address_id')->references('id')->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
