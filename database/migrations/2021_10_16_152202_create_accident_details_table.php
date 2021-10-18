<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accident_id');
            $table->text('chronology')->nullable();
            $table->string('faskes')->nullable();
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
        Schema::dropIfExists('accident_details');
    }
}
