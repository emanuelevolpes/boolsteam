@extends('layouts.app')

@section('page.title')
    ADD GENRE
@endsection

@section('page.main')
    <div class="container p-4">

        {{-- Link to go back --}}
        <a href="{{ route('admin.genres.index') }}" class="btn btn-sm btn-danger">&leftarrow; Genres List</a>
        <h2 class="my-4">Add new Genre</h2>

        {{-- Creation form --}}
        <form action="{{ route('admin.genres.store') }}" method="POST" class="my-3">
            @csrf
            <div>
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
            </div>
            
            {{-- Error Message --}}
            @error('name')
                <div class="alert alert-danger my-2">{{ $message }} </div>
            @enderror
            <button class="btn btn-success my-3">Insert</button>
        </form>
    </div>
@endsection
