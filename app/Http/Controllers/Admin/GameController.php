<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Developer;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Pegi;
use App\Models\Publisher;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

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

        $developers = Developer::all();

        $tags = Tag::all();
        $genres = Genre::all();
        $pegis = Pegi::all();
        $publishers = Publisher::all();

        return view('admin.games.create', compact('developers', 'tags', 'genres', 'pegis', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        $data = $request->validated();
        $newGame = new Game();
        
        // IMAGE STORAGE
        if (isset($data['image'])) {
            $newGame->image = Storage::put('uploads', $data['image']);
        }

        $newGame->is_available = $request['is_available'] ? 1 : 0;

        $newGame->fill($data);


        if (isset($data['developer_id'])) {
            $newGame->developer_id = $data['developer_id'];
        }
        if (isset($data['publisher_id'])) {
            $newGame->publisher_id = $data['publisher_id'];
        }
        
        $newGame->save();

        if (isset($data['tags'])) {
            $newGame->tags()->sync($data['tags']);
        }
        if (isset($data['pegis'])) {
            $newGame->pegis()->sync($data['pegis']);
        } 
        if(isset($data['genres'])){
            $newGame->genres()->sync($data['genres']);
        }
        return to_route('admin.games.index')->with('message', "New game added with success");
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
        $developers = Developer::all();
        $pegis = Pegi::all();
        $tags = Tag::all();
        $publishers = Publisher::all();
        $genres = Genre::all();

        return view('admin.games.edit', compact('game', 'developers','pegis','tags','publishers','genres'));
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
        $data = $request->validated();
        // IMAGE STORAGE
        if (isset($data['image'])) {
            if ($game->image) {
                Storage::delete($game->image);
            }
            $game->image = Storage::put('uploads', $data['image']);
        }
        //PEGI
        $game->is_available = $request['is_available'] ? 1 : 0;

        $game->fill($data);


        if (isset($data['developer_id'])) {
            $game->developer_id = $data['developer_id'];
        }
        if (isset($data['publisher_id'])) {
            $game->publisher_id = $data['publisher_id'];
        }
        
        if (isset($data['tags'])) {
            $game->tags()->sync($data['tags']);
        }
        if (isset($data['pegis'])) {
            $game->pegis()->sync($data['pegis']);
        } 
        if(isset($data['genres'])){
            $game->genres()->sync($data['genres']);
        }

        $game->update();

        
        return to_route('admin.games.index')->with('message',"Game $game->id edited with success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        

        if($game->image){
            Storage::delete($game->image);
        }

        $game->delete();
        return to_route('admin.games.index');
    }
}
