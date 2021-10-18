<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PcrasConstruction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcras_construction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pcras_id');
            $table->enum('dust',['ya', 'tidak', 'lainnya'])->nullable();
            $table->enum('barrier',['ya', 'tidak', 'lainnya'])->nullable();
            $table->enum('door_access',['ya', 'tidak', 'lainnya'])->nullable();
            $table->enum('dusty_area',['ya', 'tidak', 'lainnya'])->nullable();
            $table->enum('sign_door',['ya', 'tidak', 'lainnya'])->nullable();
            $table->enum('vent',['ya', 'tidak', 'lainnya'])->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('pcras_construction');
    }
}
