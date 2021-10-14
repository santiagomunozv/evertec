<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->bigIncrements('id')->comment('Id');
            $table->datetime('date')->comment('Date');
            $table->integer('code')->comment('Code');
            $table->unsignedBigInteger('product_id')->comment('Id product');
            $table->foreign('product_id')->references('id')->on('product');
            $table->decimal('price', 18, 2)->comment('Price');
            $table->string('document_type', 5)->comment('Document type');
            $table->string('document_number', 40)->comment('Document number');
            $table->string('customer_name', 80)->comment('Name');
            $table->string('customer_last_name', 80)->comment('Last name');
            $table->string('customer_email', 120)->comment('Email');
            $table->string('customer_mobile', 40)->comment('Mobile');
            $table->string('status', 20)->comment('Status');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE orders comment 'Store information about the orders'");
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
