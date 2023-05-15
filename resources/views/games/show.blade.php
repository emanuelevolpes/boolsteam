@extends('layouts.app')

@section('page.title')
Add new game
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('games.index')}}" class="btn btn-primary">Comics list</a>

        <h1 class="text-center">{{ $game->title }}</h1>
    </div>
@endsection