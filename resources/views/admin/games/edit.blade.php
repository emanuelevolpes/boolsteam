@extends('layouts.app')

@section('page.title')
    Add new game
@endsection
{{-- need to fix checkbox and date format --}}
@section('page.main')
    <div class="container">
        <a href="{{ route('admin.games.index') }}" class="btn btn-primary my-3">Games list</a>
        {{-- form --}}
        <form action="{{ route('admin.games.update', $game) }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- token for identification --}}
            @method('PATCH')
            {{-- title --}}
            <div>
                <label for="title" class="form-label fs-5 fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $game->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            <div class="mt-4 d-flex justify-content-evenly">
                <div>
                    <label for="image" class="form-label fs-5 fw-bold">Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror

                    {{-- description --}}
                    <div class="mt-3">
                        <label for="description" class="form-label fs-5 fw-bold">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description', $game->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>

                    {{-- publisher --}}
                    <div class="mt-3">
                        <label for="publisher_id" class="form-label fs-5 fw-bold">Publisher</label>
                        <select class="form-select @error('publisher_id') is-invalid @enderror" name="publisher_id"
                            id="publisher_id">
                            <option value="">Select Publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}"
                                    {{ old('publisher_id', $publisher->id) == $publisher->id ? 'selected' : '' }}>
                                    {{ $publisher->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('publisher_id')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    {{-- developer --}}
                    <div class="mt-3">
                        <label for="developer_id" class="form-label fs-5 fw-bold">Developer</label>
                        <select class="form-select @error('developer_id') is-invalid @enderror" name="developer_id"
                            id="developer_id">
                            <option value="">Select Developer</option>
                            @foreach ($developers as $developer)
                                <option value="{{ $developer->id }}"
                                    {{ old('developer_id', $developer->id) == $developer->id ? 'selected' : '' }}>
                                    {{ $developer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="preview">
                    <img id="file-image-preview">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                {{-- genres --}}
                <div class="mt-3 d-flex flex-column">
                    <div class="fs-5 fw-bold">Genres</div>
                    @foreach ($genres as $genre)
                        <div class="my-2">
                            <label for="{{ $genre->name }}" class="form-check-label ms-2">{{ $genre->name }}</label>
                            <input type="checkbox" class="form-check-input @error('genres') is-invalid @enderror"
                                id="{{ $genre->name }}" value="{{ $genre->id }}" name="genres[]"
                                @if ($errors->any()) {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}
                                @else
                                    {{ $game->genres->contains($genre->id) ? 'checked' : '' }} @endif>
                        </div>
                    @endforeach
                    @error('genres')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>
                {{-- Pegi --}}
                <div class="mt-3 d-flex flex-column">
                    <div class="fs-5 fw-bold">Pegi</div>
                    @foreach ($pegis as $pegi)
                        <div class="my-2">
                            <label for="{{ $pegi->name }}" class="form-check-label ms-2">{{ $pegi->name }}</label>
                            <input type="checkbox" class="form-check-input @error('pegis') is-invalid @enderror"
                                id="{{ $pegi->name }}" value="{{ $pegi->id }}" name="pegis[]"
                                @if ($errors->any()) {{ in_array($pegi->id, old('pegis', [])) ? 'checked' : '' }}
                                @else
                                    {{ $game->pegis->contains($pegi->id) ? 'checked' : '' }} @endif>
                        </div>
                    @endforeach
                    @error('pegis')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>
                {{-- Tags --}}
                <div class="mt-3 d-flex flex-column">
                    <div class="fs-4 fw-bold">Tags</div>
                    @foreach ($tags as $tag)
                        <div class="my-2">
                            <label for="{{ $tag->name }}" class="form-check-label ms-2">{{ $tag->name }}</label>
                            <input type="checkbox" class="form-check-input @error('tags') is-invalid @enderror"
                                id="{{ $tag->name }}" value="{{ $tag->id }}" name="tags[]"
                                @if ($errors->any()) 
                                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                @else
                                    {{ $game->tags->contains($tag->id) ? 'checked' : '' }} 
                                @endif>
                        </div>
                    @endforeach
                    @error('tags')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>
            </div>

            {{-- Discount --}}
            <div class="mt-3">
                <label for="discount" class="form-label fs-5 fw-bold">Discount</label>
                <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount"
                    name="discount" value="{{ old('discount', $game->discount) }}">
                @error('discount')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- platform --}}
            <div class="mt-3">
                <label for="platform" class="form-label fs-5 fw-bold">Platform</label>
                <input type="text" class="form-control @error('platform') is-invalid @enderror" id="platform"
                    name="platform" value="{{ old('platform', $game->platform) }}">
                @error('platform')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- year --}}
            <div class="mt-3">
                <label for="year" class="form-label fs-5 fw-bold">Year</label>
                <input type="date" class="form-control @error('year') is-invalid @enderror" id="image"
                    name="year" value="{{ old('year', $game->year) }}">
                @error('year')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- region --}}
            <div class="mt-3">
                <label for="region" class="form-label fs-5 fw-bold">Region</label>
                <input type="text" class="form-control @error('region') is-invalid @enderror" id="region"
                    name="region" value="{{ old('region', $game->region) }}">
                @error('region')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- sales --}}
            <div class="mt-3">
                <label for="sales" class="form-label fs-5 fw-bold">Sales</label>
                <input type="number" class="form-control @error('sales') is-invalid @enderror" id="sales"
                    name="sales" value="{{ old('sales', $game->sales) }}">
                @error('sales')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- price --}}
            <div class="mt-3">
                <label for="price" class="form-label fs-5 fw-bold">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $game->price) }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- score --}}
            <div class="mt-3">
                <label for="score" class="form-label fs-5 fw-bold">Score</label>
                <input type="number" class="form-control @error('score') is-invalid @enderror" id="score"
                    name="score" value="{{ old('score', $game->score) }}">
                @error('score')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- available --}}
            <div class="mt-3">
                <input type="checkbox" name="is_available" id="is_available"
                    class="form-check-input @error('available') is-invalid @enderror" value="1"
                    {{ old('available', $game->available) === $game->available ? 'checked' : '' }}>
                <label for="is_available" class="form-check-label">Available</label>
                @error('available')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- downloads --}}
            <div class="mt-3">
                <label for="downloads" class="form-label fs-5 fw-bold">Downloads</label>
                <input type="number" class="form-control @error('downloads') is-invalid @enderror" id="downloads"
                    name="downloads" value="{{ old('downloads', $game->downloads) }}">
                @error('downloads')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- Supported Languages --}}
            <div class="mt-3">
                <label for="supported_languages" class="form-label fs-5 fw-bold">Supported Languages</label>
                <input type="text" name="supported_languages" id="supported_languages"
                    class="form-control @error('supported_languages') is-invalid @enderror"
                    value="{{ old('supported_languages', $game->supported_languages) }}">
                @error('supported_languages')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- minimum_operating_system --}}
            <div class="mt-3">
                <label for="minimum_operating_system" class="form-label fs-5 fw-bold">Operating System</label>
                <input type="text" class="form-control @error('minimum_operating_system') is-invalid @enderror"
                    id="minimum_operating_system" name="minimum_operating_system"
                    value="{{ old('minimum_operating_system', $game->minimum_operating_system) }}">
                @error('minimum_operating_system')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- minimum_memory_ram --}}
            <div class="mt-3">
                <label for="minimum_memory_ram" class="form-label fs-5 fw-bold">RAM</label>
                <input type="number" class="form-control @error('minimum_memory_ram') is-invalid @enderror"
                    id="minimum_memory_ram" name="minimum_memory_ram"
                    value="{{ old('minimum_memory_ram', $game->minimum_memory_ram) }}">
                @error('minimum_memory_ram')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- minimum_cpu --}}
            <div class="mt-3">
                <label for="minimum_cpu" class="form-label fs-5 fw-bold">CPU</label>
                <input type="number" class="form-control @error('minimum_cpu') is-invalid @enderror" id="minimum_cpu"
                    name="minimum_cpu" value="{{ old('minimum_cpu', $game->minimum_cpu) }}">
                @error('minimum_cpu')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- minimum_gpu --}}
            <div class="mt-3">
                <label for="minimum_gpu" class="form-label fs-5 fw-bold">GPU</label>
                <input type="number" class="form-control @error('minimum_gpu') is-invalid @enderror" id="minimum_gpu"
                    name="minimum_gpu" value="{{ old('minimum_gpu', $game->minimum_gpu) }}">
                @error('minimum_gpu')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- space_required --}}
            <div class="mt-3">
                <label for="space_required" class="form-label fs-5 fw-bold">Space Required</label>
                <input type="number" class="form-control @error('space_required') is-invalid @enderror"
                    id="space_required" name="space_required"
                    value="{{ old('space_required', $game->space_required) }}">
                @error('space_required')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            <hr>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
