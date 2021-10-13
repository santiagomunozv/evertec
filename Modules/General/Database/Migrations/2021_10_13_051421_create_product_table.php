<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Id');
            $table->string('code')->comment('Code');
            $table->string('name')->comment('Name');
            $table->decimal('price', 18,2)->comment('Price');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE product comment 'Store information about the products'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
