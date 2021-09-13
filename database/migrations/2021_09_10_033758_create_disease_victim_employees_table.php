<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseVictimEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_victim_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_id');
            $table->foreignId('employee_id');
            $table->enum('salary_range', ['day', 'month', 'wholesale']);
            $table->text('chronology');
            $table->string('first_aid');
            $table->string('effect');
            $table->enum('condition', ['inap', 'jalan']);
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
        Schema::dropIfExists('disease_victim_employees');
    }
}
