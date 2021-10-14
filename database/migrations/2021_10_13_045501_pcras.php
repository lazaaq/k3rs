<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pcras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->string('name');
            $table->string('location');
            $table->string('surveyor');
            $table->dateTime('time_start');
            $table->dateTime('time_end');
            $table->string('dept');
            $table->enum('plan', ['ya', 'tidak', 'lainnya']);
            $table->enum('apd', ['ya', 'tidak', 'lainnya']);
            $table->enum('warning', ['ya', 'tidak', 'lainnya']);
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
        Schema::dropIfExists('pcras');
    }
}
