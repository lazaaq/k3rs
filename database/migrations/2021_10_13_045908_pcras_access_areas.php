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
            $table->text('plafon')->nullable();
            $table->text('floor_clean')->nullable();
            $table->text('wall')->nullable();
            $table->text('floor_dustfree')->nullable();
            $table->text('vent')->nullable();
            $table->text('insect')->nullable();
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
