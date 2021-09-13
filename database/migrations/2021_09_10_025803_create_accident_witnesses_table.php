<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentWitnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_witnesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accident_id');
            $table->string('name');
            $table->date('birth');
            $table->char('nik', 16)->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->text('address');
            $table->string('job');
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
        Schema::dropIfExists('accident_witnesses');
    }
}
