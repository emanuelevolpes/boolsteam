@extends('layouts.app')

@section('page.title')
edit {{$developer->name}}
@endsection
{{-- need to fix checkbox and date format --}}
@section('page.main')
    <div class="container">developers list</a>
        <h1 class="text-center">Edit for {{ $developer->title }}</h1>
        {{-- form --}}
        <form action="{{ route ('admin.developers.update', $developer->id) }}" method="POST">
        @csrf {{-- token for identification --}}
        @method('PATCH') {{-- real method instead of post --}}
            {{-- name --}}
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$developer->name) }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection