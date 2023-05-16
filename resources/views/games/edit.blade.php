@extends('layouts.app')

@section('page.title')
Add new game
@endsection
{{-- need to fix checkbox and date format --}}
@section('page.main')
    <div class="container">
        <a href="{{ route('games.index')}}" class="btn btn-primary">Comics list</a>
        <h1 class="text-center">Edit for {{ $game->title }}</h1>
        {{-- form --}}
        <form action="{{ route ('games.store') }}" method="POST">
        @csrf {{-- token for identification --}}
        @method('PATCH') {{-- real method instead of post --}}
            {{-- title --}}
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $game->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>        
            {{-- image --}}
            <div class="mt-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $game->image) }}">
                @error('image')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- description --}}
            <div class="mt-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $game->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- publisher --}}
            <div class="mt-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="image" id="publisher" name="publisher" value="{{ old('publisher', $game->publisher) }}">
                @error('publisher')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- developer --}}
            <div class="mt-3">
                <label for="developer" class="form-label">Developer</label>
                <input type="text" class="form-control @error('developer') is-invalid @enderror" id="image" id="developer" name="developer" value="{{ old('developer', $game->developer) }}">
                @error('developer')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- genres --}}
            <div class="mt-3">
                <label for="genres" class="form-label">Genres</label>
                <input type="text" class="form-control @error('genres') is-invalid @enderror" id="image" id="genres" name="genres" value="{{ old('genres', $game->genres) }}">
                @error('genres')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- platform --}}
            <div class="mt-3">
                <label for="platform" class="form-label">Platform</label>
                <input type="text" class="form-control @error('platform') is-invalid @enderror" id="image" id="platform" name="platform" value="{{ old('platform', $game->platform) }}">
                @error('platform')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- year --}}
            <div class="mt-3">
                <label for="year" class="form-label">Year</label>
                <input type="date" class="form-control @error('year') is-invalid @enderror" id="image" id="year" name="year" value="{{ old('year', $game->year) }}">
                @error('year')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- region --}}
            <div class="mt-3">
                <label for="region" class="form-label">Region</label>
                <input type="text" class="form-control @error('region') is-invalid @enderror" id="image" id="region" name="region" value="{{ old('region', $game->region) }}">
                @error('region')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- sales --}}
            <div class="mt-3">
                <label for="sales" class="form-label">Sales</label>
                <input type="number" class="form-control @error('sales') is-invalid @enderror" id="image" id="sales" name="sales" value="{{ old('sales', $game->sales) }}">
                @error('sales')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- price --}}
            <div class="mt-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="image" id="price" name="price" value="{{ old('price', $game->price) }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- score --}}
            <div class="mt-3">
                <label for="score" class="form-label">Score</label>
                <input type="number" class="form-control @error('score') is-invalid @enderror" id="image" id="score" name="score" value="{{ old('score', $game->score) }}">
                @error('score')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- available --}}
            <div class="mt-3">
                @dd($game->is_available)
                <input type="checkbox" name="available" id="available" class="form-check-input @error('available') is-invalid @enderror" value="{{ $game->is_available }}">
                <label for="available" class="form-check-label">Available</label> 
                @error('available')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- downloads --}}
            <div class="mt-3">
                <label for="downloads" class="form-label">Downloads</label>
                <input type="number" class="form-control @error('downloads') is-invalid @enderror" id="image" id="downloads" name="downloads" value="{{ old('downloads', $game->downloads) }}">
                @error('downloads')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- violence --}}
            <div class="mt-3">
                <input type="checkbox" name="violence" id="violence" class="form-check-input @error('violence') is-invalid @enderror" value="on" {{ old('fear') == 'on' ? 'checked' : '' }}>
                <label for="violence" class="form-check-label">Violence</label>    
                @error('violence')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- bad language --}}
            <div class="mt-3">
                <input type="checkbox" name="bad_language" id="bad_language" class="form-check-input @error('bad_language') is-invalid @enderror" checked="{{ old('bad_language', $game->bad_language) === 1 ? 'true' : null }}">
                <label for="bad_language" class="form-check-label">Bad Language</label>    
                @error('bad_language')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- fear --}}
            <div class="mt-3">
                <input type="checkbox" name="fear" id="fear" class="form-check-input @error('fear') is-invalid @enderror" value="on" {{ old('fear') == 'on' ? 'checked' : '' }}>
                <label for="fear" class="form-check-label">Fear</label>    
                @error('fear')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            {{-- gambling --}}
            <div class="mt-3">
                <input type="checkbox" name="gambling" id="gambling" class="form-check-input @error('gambling') is-invalid @enderror" checked="{{ old('gambling', $game->gambling) === 1 ? 'true' : null }}">
                <label for="gambling" class="form-check-label">Gambling</label>
                @error('gambling')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror    
            </div>
            {{-- sex --}}
            <div class="mt-3">
                <input type="checkbox" name="sex" id="sex" class="form-check-input @error('sex') is-invalid @enderror" checked="{{ old('sex', $game->sex) === 1 ? 'true' : null }}">
                <label for="sex" class="form-check-label">Sex</label>    
                @error('sex')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror 
            </div>
            {{-- drugs --}}
            <div class="mt-3">
                <input type="checkbox" name="drugs" id="drugs" class="form-check-input @error('drugs') is-invalid @enderror" checked="{{ old('drugs', $game->drugs) === 1 ? 'true' : null }}">
                <label for="drugs" class="form-check-label">Drugs</label>  
                @error('drugs')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror  
            </div>
            {{-- discriminations --}}
            <div class="mt-3">
                <input type="checkbox" name="discriminations" id="discriminations" class="form-check-input @error('discriminations') is-invalid @enderror" checked="{{ old('discriminations', $game->discriminations) === 1 ? 'true' : null }}">
                <label for="discriminations" class="form-check-label">Discriminations</label>  
                @error('discriminations')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror   
            </div>
            {{-- Single player --}}
            <div class="mt-3">
                <input type="checkbox" name="single_player" id="single_player" class="form-check-input @error('single_player') is-invalid @enderror" checked="{{ old('single_player', $game->single_player) === 1 ? 'true' : null }}">
                <label for="single_player" class="form-check-label">Single Player</label>  
                @error('single_player')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror   
            </div>
            {{-- multiplayer --}}
            <div class="mt-3">
                <input type="checkbox" name="multiplayer" id="multiplayer" class="form-check-input @error('multiplayer') is-invalid @enderror" checked="{{ old('multiplayer', $game->multiplayer) === 1 ? 'true' : null }}">
                <label for="multiplayer" class="form-check-label">Multiplayer</label>
                @error('multiplayer')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror     
            </div>
            {{-- Online pvp --}}
            <div class="mt-3">
                <input type="checkbox" name="online_pvp" id="online_pvp" class="form-check-input @error('online_pvp') is-invalid @enderror" checked="{{ old('online_pvp', $game->online_pvp) === 1 ? 'true' : null }}">
                <label for="online_pvp" class="form-check-label">Online PvP</label>
                @error('online_pvp')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror     
            </div>
            {{-- Online Coop --}}
            <div class="mt-3">
                <input type="checkbox" name="online_coop" id="online_coop" class="form-check-input @error('online_coop') is-invalid @enderror" checked="{{ old('online_coop', $game->availonline_coopable) === 1 ? 'true' : null }}">
                <label for="online_coop" class="form-check-label">Online Coop</label>
                @error('online_coop')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror     
            </div>
            {{-- Supported Languages --}}
            <div class="mt-3">
                <input type="checkbox" name="supported_languages" id="supported_languages" class="form-check-input @error('supported_languages') is-invalid @enderror" value="{{ old('supported_languages', $game->supported_languages) }}">
                <label for="supported_languages" class="form-check-label">Supported Languages</label> 
                @error('supported_languages')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror   
            </div>
            {{-- DLC --}}
            <div class="mt-3">
                <input type="checkbox" name="is_dlc" id="is_dlc" class="form-check-input @error('is_dlc') is-invalid @enderror" checked="{{ old('is_dlc', $game->is_dlc) === 1 ? 'true' : null }}">
                <label for="is_dlc" class="form-check-label">DLC</label> 
                @error('is_dlc')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror     
            </div>
            {{-- minimum_operating_system --}}
            <div class="mt-3">
                <label for="minimum_operating_system" class="form-label">Operating System</label>
                <input type="text" class="form-control @error('minimum_operating_system') is-invalid @enderror" id="image" id="minimum_operating_system" name="minimum_operating_system" value="{{ old('minimum_operating_system', $game->minimum_operating_system) }}">
                @error('minimum_operating_system')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror 
            </div>  
            {{-- minimum_memory_ram --}}
            <div class="mt-3">
                <label for="minimum_memory_ram" class="form-label">RAM</label>
                <input type="number" class="form-control @error('minimum_memory_ram') is-invalid @enderror" id="image" id="minimum_memory_ram" name="minimum_memory_ram" value="{{ old('minimum_memory_ram', $game->minimum_memory_ram) }}">
                @error('minimum_memory_ram')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror 
            </div>
            {{-- minimum_cpu --}}
            <div class="mt-3">
                <label for="minimum_cpu" class="form-label">CPU</label>
                <input type="number" class="form-control @error('minimum_cpu') is-invalid @enderror" id="image" id="minimum_cpu" name="minimum_cpu" value="{{ old('minimum_cpu', $game->minimum_cpu) }}">
                @error('minimum_cpu')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror 
            </div>
            {{-- minimum_gpu --}}
            <div class="mt-3">
                <label for="minimum_gpu" class="form-label">GPU</label>
                <input type="number" class="form-control @error('minimum_gpu') is-invalid @enderror" id="image" id="minimum_gpu" name="minimum_gpu" value="{{ old('minimum_gpu', $game->minimum_gpu) }}">
                @error('minimum_gpu')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror 
            </div>
            {{-- space_required --}}
            <div class="mt-3">
                <label for="space_required" class="form-label">Space Required</label>
                <input type="number" class="form-control @error('space_required') is-invalid @enderror" id="image" id="space_required" name="space_required" value="{{ old('space_required', $game->space_required) }}">
                @error('space_required')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror 
            </div>
            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection