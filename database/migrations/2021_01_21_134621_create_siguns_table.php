<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSigunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siguns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 4);
            $table->string('name', 255);
            $table->unsignedTinyInteger('seq')->nullable();
            $table->timestamps();

            $table->unique('code');
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siguns');
    }
}
