@extends('layouts.app')

@section('page.title')
    EDIT TAG {{ $tag->name }}
@endsection

@section('page.main')
    <div class="container p-4">
         {{-- Link to go back --}}
        <a href="{{ route('admin.tags.index')  }}" class="btn btn-sm btn-danger">&leftarrow; Tags List</a>
        <h2 class="my-4">Edit Tag: {{ $tag->name }}</h2>

         {{-- Edit form --}}
        <form action="{{ route('admin.tags.update', $tag) }}" method="POST" class="my-3">
            @csrf
            @method('PATCH')
            <div>
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $tag->name)}}">
            </div>
            
            {{-- Error Message --}}
            @error('name')
                <div class="alert alert-danger my-2">{{ $message }} </div>
            @enderror
            <button class="btn btn-success my-3">Insert</button>
        </form>
    </div>
@endsection