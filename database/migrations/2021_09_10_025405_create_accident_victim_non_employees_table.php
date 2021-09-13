<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentVictimNonEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_victim_non_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accident_id');
            $table->string('name');
            $table->date('birth');
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
        Schema::dropIfExists('accident_victim_non_employees');
    }
}
