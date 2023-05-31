@extends('layouts.app')

@section('page.title')
    Add new game
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('admin.games.index') }}" class="btn btn-primary">Games list</a>
        {{-- form --}}
        <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- token for identification --}}
            {{-- title --}}
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- image --}}
            <div class="mt-3">
                <div class="preview">
                    <img id="file-image-preview">
                </div>
                <label for="image" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror"  type="file" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
              </div>
            {{-- description --}}
            <div class="mt-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- publisher --}}
            <div class="mt-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="image" id="publisher" name="publisher" value="{{ old('publisher') }}">
                @error('publisher')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- developer --}}

            <div class="mt-3">
                <label for="developer_id" class="form-label">Developer</label>
                <select class="form-select @error('developer_id') is-invalid @enderror" name="developer_id" id="developer_id">
                    <option value="">Select Developer</option>
                    @foreach ($developers as $developer)
                        <option value="{{ $developer->id }}" {{ old('developer_id') == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- genres --}}
            <div class="mt-3">
                <div>Genres</div>
                @foreach ($genres as $genre)
                    <label for="{{ $genre->name }}" class="form-check-label ms-2">{{ $genre->name }}</label>
                    <input type="checkbox" class="form-check-input @error('genres') is-invalid @enderror" id="{{ $genre->name }}" value="{{ $genre->id }}" name="genres[]" {{ in_array($genre->id, old('genre', [])) ? 'checked' : ''}}>    
                @endforeach
                @error('genres')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- platform --}}
            <div class="mt-3">
                <label for="platform" class="form-label">Platform</label>
                <input type="text" class="form-control @error('platform') is-invalid @enderror" id="platform" name="platform" value="{{ old('platform') }}">
                @error('platform')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- year --}}
            <div class="mt-3">
                <label for="year" class="form-label">Year</label>
                <input type="date" class="form-control @error('year') is-invalid @enderror" id="image" name="year" value="{{ old('year') }}">
                @error('year')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- region --}}
            <div class="mt-3">
                <label for="region" class="form-label">Region</label>
                <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="{{ old('region') }}">
                @error('region')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- sales --}}
            <div class="mt-3">
                <label for="sales" class="form-label">Sales</label>
                <input type="number" class="form-control @error('sales') is-invalid @enderror" id="sales" name="sales" value="{{ old('sales') }}">
                @error('sales')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- Pegi --}}
            <div class="mt-3">
                <div>Pegi</div>
                @foreach ($pegis as $pegi)
                    <label for="{{ $pegi->name }}" class="form-check-label ms-2">{{ $pegi->name }}</label>
                    <input type="checkbox" class="form-check-input @error('pegis') is-invalid @enderror" id="{{ $pegi->name }}" value="{{ $pegi->id }}" name="pegis[]" {{ in_array($pegi->id, old('pegi', [])) ? 'checked' : ''}}>    
                @endforeach
                @error('pegis')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- price --}}
            <div class="mt-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- score --}}
            <div class="mt-3">
                <label for="score" class="form-label">Score</label>
                <input type="number" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ old('score') }}">
                @error('score')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- available --}}
            <div class="mt-3">
                <input type="checkbox" name="is_available" id="is_available" class="form-check-input @error('available') is-invalid @enderror" value="1">
                <label for="is_available" class="form-check-label">Available</label>
                @error('available')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- downloads --}}
            <div class="mt-3">
                <label for="downloads" class="form-label">Downloads</label>
                <input type="number" class="form-control @error('downloads') is-invalid @enderror" id="downloads" name="downloads" value="{{ old('downloads') }}">
                @error('downloads')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- Tags --}}
            <div class="mt-3">
                <div>Tags</div>
                @foreach ($tags as $tag)
                    <label for="{{ $tag->name }}" class="form-check-label ms-2">{{ $tag->name }}</label>
                    <input type="checkbox" class="form-check-input @error('tags') is-invalid @enderror" id="{{ $tag->name }}" value="{{ $tag->id }}" name="tags[]" {{ in_array($tag->id, old('tag', [])) ? 'checked' : ''}}>    
                @endforeach
                @error('tags')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- Supported Languages --}}
            <div class="mt-3">
                <input type="text" name="supported_languages" id="supported_languages" class="form-control @error('supported_languages') is-invalid @enderror">
                <label for="supported_languages" class="form-label">Supported Languages</label>
                @error('supported_languages')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- minimum_operating_system --}}
            <div class="mt-3">
                <label for="minimum_operating_system" class="form-label">Operating System</label>
                <input type="text" class="form-control @error('minimum_operating_system') is-invalid @enderror" id="minimum_operating_system" name="minimum_operating_system" value="{{ old('minimum_operating_system') }}">
                @error('minimum_operating_system')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- minimum_memory_ram --}}
            <div class="mt-3">
                <label for="minimum_memory_ram" class="form-label">RAM</label>
                <input type="number" class="form-control @error('minimum_memory_ram') is-invalid @enderror" id="minimum_memory_ram" name="minimum_memory_ram" value="{{ old('minimum_memory_ram') }}">
                @error('minimum_memory_ram')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- minimum_cpu --}}
            <div class="mt-3">
                <label for="minimum_cpu" class="form-label">CPU</label>
                <input type="number" class="form-control @error('minimum_cpu') is-invalid @enderror" id="minimum_cpu" name="minimum_cpu" value="{{ old('minimum_cpu') }}">
                @error('minimum_cpu')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- minimum_gpu --}}
            <div class="mt-3">
                <label for="minimum_gpu" class="form-label">GPU</label>
                <input type="number" class="form-control @error('minimum_gpu') is-invalid @enderror" id="minimum_gpu" name="minimum_gpu" value="{{ old('minimum_gpu') }}">
                @error('minimum_gpu')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- space_required --}}
            <div class="mt-3">
                <label for="space_required" class="form-label">Space Required</label>
                <input type="number" class="form-control @error('space_required') is-invalid @enderror" id="space_required" name="space_required" value="{{ old('space_required') }}">
                @error('space_required')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>


            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
