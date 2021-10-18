<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class B3sDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b3s_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('b3s_id');
            $table->text('human')->nullable();
            $table->enum('wash', ['ya', 'tidak'])->nullable();
            $table->enum('injury', ['ya', 'tidak'])->nullable();
            $table->string('tool')->nullable();
            $table->string('effect')->nullable();
            $table->text('follow_up')->nullable();
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
        Schema::dropIfExists('b3s_detail');
    }
}
