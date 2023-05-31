@extends('layouts.app')

@section('page.title')
    {{ $genre->name }}
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('admin.genres.index') }}" class="btn btn-sm btn-danger mt-4">&leftarrow; Back</a>
        <h1 class="my-3">{{ strtoupper($genre->name) }}</h1>
        <div class="badge bg-success">{{ $genre->slug }}</div>
    </div>
@endsection
