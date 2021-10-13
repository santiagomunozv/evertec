<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleoptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_option', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Id');
            $table->boolean('create')->comment('Create');
            $table->boolean('update')->comment('Update');
            $table->boolean('delete')->comment('Delete');
            $table->boolean('read')->comment('Read');
            $table->boolean('inactive')->comment('Inactive');
            $table->unsignedBigInteger('role_id')->comment('Id role');
            $table->foreign('role_id')->references('id')->on('role');
            $table->unsignedBigInteger('option_id')->comment('Id option');
            $table->foreign('option_id')->references('id')->on('option');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_option');
    }
}
