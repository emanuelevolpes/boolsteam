<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        Game::truncate();
        $new_game = new Game();

        // MAIN
        $new_game->title = $faker->sentence(5); // Genera una scritta di 5 parole
        $new_game->image = $faker->imageUrl(480, 640 , 'games'); // URL immagine random con dimensioni 480x640
        $new_game->description = $faker->text(); // Genera un testo di 200 
        $new_game->publisher = $faker->sentence(3); // Genera una scritta di 3 parole
        $new_game->developer = $faker->sentence($faker->randomDigitNot(0)); // Genera un scritta con un numero random di parole
        $new_game->genres = Arr::join($faker->randomElements(['Fantasy', 'MMO', 'MOBA', 'RPG', 'Action', 'FPS' , 'Shooter', 'Adventure'], 2), ', '); // Genera una stringa di 2 generi separati dalla virgola partendo da un array di partenza 
        $new_game->platform = Arr::join($faker->randomElements(['PC', 'PS4', 'XBOX', 'PS5', 'Nintendo Switch'], $faker->numberBetween(1,5)), ', '); // Genera una stringa da un array lunga un numero random tra 1 e 5
        $new_game->year = $faker->date(); // Data in formato  (y-m-d)
        // -------
        // TAGS
        $new_game->single_player = $faker->boolean();
        $new_game->multiplayer = $faker->boolean(); 
        $new_game->online_pvp = $faker->boolean(); 
        $new_game->online_coop = $faker->boolean();
        $new_game->supported_languages = Arr::join($faker->randomElements(['Italian', 'English', 'Franch', 'Spanish'], $faker->numberBetween(1,4)), ', '); // Genera una strina da un array lunga un numero random tra 1 e 4
        $new_game->is_dlc = $faker->boolean();
        // -------
        // REQUIRED SYSTEM
        $new_game->minimum_operating_system = $faker->randomElement(['Windows 7', 'Windows 8' , 'Window 10']); // Prende un elemento dall'array fornito
        $new_game->minimum_memry_ram = $faker->numberBetween(4,16); // ram compresa tra 4 e 16
        $new_game->minimum_gpu = $faker->numberBetween(4,24); // !! CHECK !! genera un numero random tra 4 e 24 inteso come dimensione della v-ram 
        $new_game->minimum_cpu = $faker->numberBetween(4,32); // !! CHECK !! Genera un numero random tra 4 e 32 inteso come il numero di core della cpu
        $new_game->space_required = $faker->randomFloat(2, 1, 999); // Genera un valore con due decimali compresto tra 2 e 999

        $new_game->save();
    }
}