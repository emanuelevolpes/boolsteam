<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developers = ['Ubisoft', 'Rockstar Games', 'Activision Blizzard', 'Capcom', 'Microsoft', 'Electronics Art', 'Bethesda Softworks', 'Nintendo Software'];

        Schema::disableForeignKeyConstraints();
        Developer::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($developers as $developer) {

            $new_developer = new Developer();
            $new_developer->name = $developer;
            $new_developer->slug = Str::slug($new_developer->name);
            $new_developer->save();
        }
    }
}
