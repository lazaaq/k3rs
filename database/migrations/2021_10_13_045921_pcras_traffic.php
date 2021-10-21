<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PcrasTraffic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcras_traffic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pcras_id');
            $table->text('barrier')->nullable();
            $table->text('remove_puing')->nullable();
            $table->text('route')->nullable();
            $table->text('access')->nullable();
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
        Schema::dropIfExists('pcras_traffic');
    }
}
