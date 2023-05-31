@extends('layouts.app')

@section('page.title')
    Add new developer
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('admin.developers.index') }}" class="btn btn-primary">Developers list</a>
        {{-- form --}}
        <form action="{{ route('admin.developers.store') }}" method="POST">
            @csrf {{-- token for identification --}}
            {{-- name --}}
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
