<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PcrasDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcras_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pcras_id');
            $table->text('not_eligible')->nullable();
            $table->string('reported')->nullable();
            $table->date('reporting_date')->nullable();
            $table->date('re_survey_date')->nullable();
            $table->string('surveyor')->nullable();
            $table->enum('accordance', ['ada', 'tidak'])->nullable();
            $table->text('further_action')->nullable();
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
        Schema::dropIfExists('pcras_detail');
    }
}
