<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apars', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->date('time')->nullable();
            $table->text('location');
            $table->enum('code', ['a', 'b', 'c', 'd', 'e', 'f', 'g']);
            $table->date('expired')->nullable();
            $table->enum('condition', ['baik', 'tidak baik']);
            $table->text('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apars');
    }
}
