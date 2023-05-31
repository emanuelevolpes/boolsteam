<?php

namespace Database\Seeders;

use App\Models\Pegi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PegiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegis = ['violence', 'bad_language', 'fear', 'gambling', 'sex', 'drugs', 'discriminatios'];

        Schema::disableForeignKeyConstraints();
        Pegi::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($pegis as $pegi){
            $newPegi = new Pegi();
            $newPegi->name = $pegi;
            $newPegi->slug = Str::slug($newPegi->name);
            $newPegi->save();
        }
    }
}
