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
            $table->text('dust')->nullable();
            $table->text('barrier')->nullable();
            $table->text('door_access')->nullable();
            $table->text('dusty_area')->nullable();
            $table->text('sign_door')->nullable();
            $table->text('vent')->nullable();
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
