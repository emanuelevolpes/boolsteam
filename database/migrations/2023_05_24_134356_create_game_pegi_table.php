<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_pegi', function (Blueprint $table) {

            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pegi_id')->constrained()->cascadeOnDelete();
            $table->primary('game_id','pegi_id');
            
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
        Schema::dropIfExists('game_pegi');
    }
};
