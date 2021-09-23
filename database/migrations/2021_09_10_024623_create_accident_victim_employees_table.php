<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentVictimEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_victim_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accident_id');
            $table->foreignId('employee_id');
            $table->enum('salary_range', ['day', 'month', 'wholesale'])->nullable();
            $table->text('chronology')->nullable();
            $table->string('first_aid')->nullable();
            $table->string('effect')->nullable();
            $table->enum('condition', ['inap', 'jalan'])->nullable();
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
        Schema::dropIfExists('accident_victim_employees');
    }
}
