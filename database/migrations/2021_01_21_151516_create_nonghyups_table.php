<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonghyupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonghyups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 8)->unique();
            $table->string('name', 255);
            $table->string('address', 255)->nullable();
            $table->string('addr_part1', 255)->nullable();
            $table->string('addr_part2', 255)->nullable();
            $table->string('contact', 11)->nullable();
            $table->string('ceo', 255)->nullable();
            $table->string('sigun', 4)->nullable();
            $table->boolean('active')->default(0);
            $table->unsignedSmallInteger('seq')->default(1);
            $table->timestamps();

            // 외래키
            $table->foreign('sigun')->references('code')->on('siguns')->onUpdate('cascade');  //시군 코드
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nonghyups');
    }
}
