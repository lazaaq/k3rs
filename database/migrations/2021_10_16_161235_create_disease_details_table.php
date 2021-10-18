<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_id');
            $table->text('chronology')->nullable();
            $table->string('faskes')->nullable();
            $table->text('cause')->nullable();
            $table->enum('effect', ['patah tulang', 'covid', 'serangan jantung', 'lainnya'])->nullable();
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
        Schema::dropIfExists('disease_details');
    }
}
