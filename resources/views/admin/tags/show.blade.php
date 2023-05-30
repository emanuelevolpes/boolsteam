@extends('layouts.app')

@section('page.title')
    {{ $pegi->name }}
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('admin.tags.index') }}" class="btn btn-sm btn-danger mt-4">&leftarrow; Back</a>
        <h1 class="my-3">{{ strtoupper($tag->name) }}</h1>
        <div class="badge bg-success">{{ $tag->slug }}</div>
    </div>
@endsection
