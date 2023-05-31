@extends('layouts.app')

@section('page.title')
Edit {{$publisher->name}}
@endsection
{{-- need to fix checkbox and date format --}}
@section('page.main')
    <div class="container p-4">
        <a href="{{ route('admin.publishers.index')}}" class="btn btn-sm btn-danger">Publishers List</a>
        <h1 class="text-center">Edit for {{ $publisher->name }}</h1>
        {{-- form --}}
        <form action="{{ route ('admin.publishers.update', $publisher->id) }}" method="POST">
        @csrf {{-- token for identification --}}
        @method('PATCH') {{-- real method instead of post --}}
            {{-- name --}}
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$publisher->name) }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            <hr>
            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection