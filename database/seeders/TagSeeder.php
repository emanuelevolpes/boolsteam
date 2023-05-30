<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Single Player','Multiplayer','Online','Coop','Pvp','DLC'];

        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        foreach($tags as $tag){
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->slug = Str::slug($newTag->name);

            $newTag->save();
        }
    }
}
