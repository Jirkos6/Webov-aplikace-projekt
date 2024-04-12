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
        Schema::create('Country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('shortcut', 5);
            $table->binary('flag');

        });
    }

    /**
     * Reverse the migrations.
     *ph
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Country');
    }
};
