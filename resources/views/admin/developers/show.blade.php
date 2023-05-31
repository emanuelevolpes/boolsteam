@extends('layouts.app')

@section('page.title')
    {{ $developer->name}}
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('admin.developers.index') }}" class="btn btn-primary">developers list</a>
        <div class="d-flex  gap-3 my-5">
            <div class="mt-3">
                <h1>{{ $developer->name }}</h1>
                    <ul>
                        @foreach ( $developer->games as $game)
                            <li><a href="{{route('admin.games.show', $game->id)}}">{{$game->title}}</a></li>
                        @endforeach
            </div>
        </div>
    </div>
@endsection
