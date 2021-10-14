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
            $table->text('not_eligible');
            $table->string('reported');
            $table->date('reporting_date');
            $table->date('re_survey_date');
            $table->string('surveyor');
            $table->enum('accordance', ['ada', 'tidak']);
            $table->text('further_action');
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
