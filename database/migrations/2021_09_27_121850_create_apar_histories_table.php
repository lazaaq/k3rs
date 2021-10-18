<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apar_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apar_id');
            $table->text('image')->nullable();
            $table->enum('condition', ['baik', 'tidak baik'])->nullable();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('apar_histories');
    }
}
