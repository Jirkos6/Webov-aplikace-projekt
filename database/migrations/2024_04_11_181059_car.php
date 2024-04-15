<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('Car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('made');
            $table->integer('Country_id')->unsigned();
            $table->foreign('Country_id')->references('id')->on('Country')->onDelete('no action')->onUpdate('no action');
            $table->date('deleted_at')->nullable()->default(null);
            $table->date('created_at')->nullable()->default(null);
            $table->date('updated_at')->nullable()->default(null);
            $table->integer('delete_time')->nullable()->default(null);
            $table->integer('edit_time')->nullable()->default(null);
            $table->integer('create_time')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Car');
    }
};
