<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){

        $game = Game::with('tags','genres','developer','pegis','publisher')->paginate(6);

        return response()->json([
            'success' => true,
            'games' => $game,
        ]);
    }
    public function one(){
        $game = Game::with('tags','genres','developer','pegis','publisher')->inRandomOrder()->first();

        return response()->json([
            'success' => true,
            'game' => $game,
        ]);
    }
}
