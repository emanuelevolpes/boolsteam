@extends('layouts.app')

@section('page.title')
Home Page
@endsection

@section('page.main')
    <div class="container">
        <h1 class="text-center">Welcome to Boolsteam</h1>
        <h3 class="text-center">Admin section</h3>
        <a href="{{route('games.index')}}">Games list</a>
    </div>
@endsection