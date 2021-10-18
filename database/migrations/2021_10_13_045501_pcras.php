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
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('surveyor')->nullable();
            $table->dateTime('time_start')->nullable();
            $table->dateTime('time_end')->nullable();
            $table->string('dept')->nullable();
            $table->enum('plan', ['ya', 'tidak', 'lainnya'])->nullable();
            $table->enum('apd', ['ya', 'tidak', 'lainnya'])->nullable();
            $table->enum('warning', ['ya', 'tidak', 'lainnya'])->nullable();
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
