
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class B3sAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b3s_action', function (Blueprint $table) {
            $table->id();
            $table->foreignId('b3s_id');
            $table->enum('supervisor_room', ['ya', 'tidak'])->nullable();
            $table->enum('supervisor_sanitasi', ['ya', 'tidak'])->nullable();
            $table->enum('eliminate', ['ya', 'tidak'])->nullable();
            $table->enum('glove', ['ya', 'tidak'])->nullable();
            $table->enum('waste', ['ya', 'tidak'])->nullable();
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
        Schema::dropIfExists('b3s_action');
    }
}
