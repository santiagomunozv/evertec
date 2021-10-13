<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Id');
            $table->string('name')->comment('Nombre');
            $table->string('route')->comment('Ruta');
            $table->unsignedBigInteger('module_id')->comment('Id module');
            $table->foreign('module_id')->references('id')->on('module');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option');
    }
}
