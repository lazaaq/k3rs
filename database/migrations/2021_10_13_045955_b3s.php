<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class B3s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b3s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->string('location')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->string('type')->nullable();
            $table->text('chronology')->nullable();
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
        Schema::dropIfExists('b3s');
    }
}
