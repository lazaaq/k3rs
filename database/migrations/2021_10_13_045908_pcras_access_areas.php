<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PcrasAccessAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcras_access_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pcras_id');
            $table->enum('plafon', ['ada', 'tidak', 'lainnya']);
            $table->enum('floor_clean', ['ada', 'tidak', 'lainnya']);
            $table->enum('wall', ['ada', 'tidak', 'lainnya']);
            $table->enum('floor_dustfree', ['ada', 'tidak', 'lainnya']);
            $table->enum('vent', ['ada', 'tidak', 'lainnya']);
            $table->enum('insect', ['ada', 'tidak', 'lainnya']);
            $table->text('comment');
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
        Schema::dropIfExists('pcras_access_areas');
    }
}
