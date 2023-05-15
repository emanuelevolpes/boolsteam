@extends('layouts.app')

@section('page.title')
Add new game
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('games.index')}}" class="btn btn-primary">Comics list</a>
        <h1>Add new game</h1>
        {{-- form --}}
        <form action="{{ route('games.store') }}" method="POST">
        @csrf {{-- token for identification --}}
            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection