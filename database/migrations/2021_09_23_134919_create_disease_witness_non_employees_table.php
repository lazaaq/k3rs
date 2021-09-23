<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseWitnessNonEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_witness_non_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_id');
            $table->string('name')->nullable();
            $table->date('birth')->nullable();
            $table->char('nik', 16)->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->text('address')->nullable();
            $table->string('job')->nullable();
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
        Schema::dropIfExists('disease_witness_non_employees');
    }
}
