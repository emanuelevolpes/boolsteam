<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        $data = $request->all();
        $newGame = new Game();
        //PEGI
        $newGame->is_available = $request['is_available'] ? 1 : 0;
        $newGame->violence = $request['violence'] ? 1 : 0;
        $newGame->bad_language = $request['bad_language'] ? 1 : 0;
        $newGame->fear = $request['fear'] ? 1 : 0;
        $newGame->gambling = $request['gambling'] ? 1 : 0;
        $newGame->sex = $request['sex'] ? 1 : 0;
        $newGame->drugs = $request['drugs'] ? 1 : 0;
        $newGame->discriminations = $request['discriminations'] ? 1 : 0;
        //TAGS
        $newGame->single_player = $request['single_player'] ? 1 : 0;
        $newGame->multiplayer = $request['multiplayer'] ? 1 : 0;
        $newGame->online_pvp = $request['online_pvp'] ? 1 : 0;
        $newGame->online_coop = $request['online_coop'] ? 1 : 0;
        $newGame->is_dlc = $request['is_dlc'] ? 1 : 0;
        $newGame->fill($data);
        $newGame->save();

        return to_route('admin.games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $data = $request->all();
        //PEGI
        $game->is_available = $request['is_available'] ? 1 : 0;
        $game->violence = $request['violence'] ? 1 : 0;
        $game->bad_language = $request['bad_language'] ? 1 : 0;
        $game->fear = $request['fear'] ? 1 : 0;
        $game->gambling = $request['gambling'] ? 1 : 0;
        $game->sex = $request['sex'] ? 1 : 0;
        $game->drugs = $request['drugs'] ? 1 : 0;
        $game->discriminations = $request['discriminations'] ? 1 : 0;
        //TAGS
        $game->single_player = $request['single_player'] ? 1 : 0;
        $game->multiplayer = $request['multiplayer'] ? 1 : 0;
        $game->online_pvp = $request['online_pvp'] ? 1 : 0;
        $game->online_coop = $request['online_coop'] ? 1 : 0;
        $game->is_dlc = $request['is_dlc'] ? 1 : 0;

        $game->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return to_route('admin.games.index');
    }
}
