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
            $table->enum('barrier', ['ada', 'tidak', 'lainnya'])->nullable();
            $table->enum('remove_puing', ['ada', 'tidak', 'lainnya'])->nullable();
            $table->enum('route', ['ada', 'tidak', 'lainnya'])->nullable();
            $table->enum('access', ['ada', 'tidak', 'lainnya'])->nullable();
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
