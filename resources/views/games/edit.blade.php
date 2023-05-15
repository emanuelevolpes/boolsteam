@extends('layouts.app')

@section('page.title')
Add new game
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('games.index')}}" class="btn btn-primary">Comics list</a>
        <h1 class="text-center">Edit for {{ $game->title }}</h1>
        {{-- form --}}
        <form action="{{ route ('games.store') }}" method="POST">
        @csrf {{-- token for identification --}}
        @method('PATCH') {{-- real method instead of post --}}
            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection