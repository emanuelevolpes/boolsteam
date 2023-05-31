@extends('layouts.app')

@section('page.title')
    {{ $publisher->name }}
@endsection

@section('page.main')
    <div class="container p-4">
        <a href="{{ route('admin.publishers.index') }}" class="btn btn-primary">Publisher List</a>
        <div class="d-flex  gap-3 my-5">
            <div class="mt-3">
                <h1>{{ $publisher->name }}</h1>
                <ul class="list-unstyled">
                    @foreach ($publisher->games as $game)
                        <li>
                            <a href="{{ route('admin.games.show', $game) }}" >{{ $game->title }}</a>
                        </li>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
