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
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['violence','bad_language','fear','gambling','sex','drugs','discriminations']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->boolean('violence')->default(false);
            $table->boolean('bad_language')->default(false);
            $table->boolean('fear')->default(false);
            $table->boolean('gambling')->default(false);
            $table->boolean('sex')->default(false);
            $table->boolean('drugs')->default(false);
            $table->boolean('discriminations')->default(false);
        });
    }
};
