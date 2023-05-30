@extends('layouts.app')

@section('page.title')
    Pegis
@endsection

@section('page.main')
    <div class="container p-4">
        <a href="{{ route('admin.pegis.index') }}" class="btn btn-sm btn-danger">&leftarrow; Pegis List</a>
        <h2 class="my-4">Add new Pegi</h2>
        <form action="{{ route('admin.pegis.store') }}" method="POST" class="my-3">
            @csrf
            <div>
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
            </div>
            @error('name')
                <div class="alert alert-danger my-2">{{ $message }} </div>
            @enderror
            <button class="btn btn-success my-3">Insert</button>
        </form>
    </div>
@endsection
