<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Game::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 50; $i++) {
            $new_game = new Game();

            $developer = Developer::inRandomOrder()->first();
            $publisher = Publisher::inRandomOrder()->first();
            // MAIN
            $new_game->title = $faker->sentence(5); // Genera una scritta di 5 parole
            $new_game->image = $faker->imageUrl(480, 640, 'games'); // URL immagine random con dimensioni 480x640
            $new_game->description = $faker->text(); // Genera un testo di 200 
            $new_game->publisher_id = $publisher->id; // G
            $new_game->developer_id = $developer->id; // Genera un scritta con un numero random di parole
            $new_game->platform = Arr::join($faker->randomElements(['PC', 'PS4', 'XBOX', 'PS5', 'Nintendo Switch'], $faker->numberBetween(1, 5)), ', '); // Genera una stringa da un array lunga un numero random tra 1 e 5
            $new_game->year = $faker->date('Y-m-d'); // Data in formato  (Y-m-d)

            //COMMERCIAL 
            $new_game->region = $faker->state(); //Generate a string containing random state.
            $new_game->sales = $faker->randomNumber(6, true); //Generate a random number of 6 digits
            $new_game->price = $faker->randomFloat(2, 1, 9999); //Generates a random float 
            $new_game->score = $faker->randomFloat(3, 1, 100); //Generates a random float
            $new_game->is_available = $faker->boolean();
            $new_game->downloads = $faker->numberBetween(0, 65535); //Generate a random number between 0 and 65535

            // TAGS
            $new_game->supported_languages = Arr::join($faker->randomElements(['Italian', 'English', 'French', 'Spanish'], $faker->numberBetween(1, 4)), ', '); // Genera una strina da un array lunga un numero random tra 1 e 4

            // REQUIRED SYSTEM
            $new_game->minimum_operating_system = $faker->randomElement(['Windows 7', 'Windows 8', 'Window 10']); // Prende un elemento dall'array fornito
            $new_game->minimum_memory_ram = $faker->numberBetween(4, 16); // ram compresa tra 4 e 16
            $new_game->minimum_gpu = $faker->numberBetween(4, 24); // !! CHECK !! genera un numero random tra 4 e 24 inteso come dimensione della v-ram 
            $new_game->minimum_cpu = $faker->numberBetween(4, 32); // !! CHECK !! Genera un numero random tra 4 e 32 inteso come il numero di core della cpu
            $new_game->space_required = $faker->randomFloat(2, 1, 999); // Genera un valore con due decimali compresto tra 2 e 999

            $new_game->save();
        }
    }
}
