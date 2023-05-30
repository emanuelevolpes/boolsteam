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
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            //MAIN
            $table->string('title', 100);
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->string('publisher', 100);
            $table->text('genres');
            $table->string('platform');
            $table->date('year');

            //COMMERCIAL
            $table->string('region');
            $table->unsignedMediumInteger('sales'); //todo: region_sales
            $table->float('price', 6, 2);
            $table->float('score', 6, 3);
            $table->boolean('is_available')->default(true);
            $table->unsignedMediumInteger('downloads');

            //TAGS
            $table->text('supported_languages');

            //REQUIREMENTS
            $table->string('minimum_operating_system');
            $table->tinyInteger('minimum_memory_ram');
            $table->tinyInteger('minimum_gpu');
            $table->tinyInteger('minimum_cpu');
            $table->float('space_required', 5, 2);

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
        Schema::dropIfExists('games');
    }
};
