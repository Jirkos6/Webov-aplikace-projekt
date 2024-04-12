<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('Country_id')->unsigned();
            $table->foreign('Country_id')->references('id')->on('Country')->onDelete('no action')->onUpdate('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Company');
    }
};
