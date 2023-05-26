@extends('layouts.app')

@section('page.title')
    Add new game
@endsection

@section('page.main')
    <div class="container">
        <a href="{{ route('admin.games.index') }}" class="btn btn-primary">Comics list</a>
        <div class="d-flex  gap-3 my-5">
            <div>
                <img class="img-fluid" src="{{ asset('storage/' . $game->image)}}" alt="{{ $game->title }}">
            </div>
            <div class="mt-3">
                <ul class="list-unstyled">
                    <li>
                        <h1>{{ $game->title }}</h1>
                    </li>
                    <li class="my-3">
                        <p>{{ $game->description }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 p-3">
            <div class="card p-3">
                <h2 class="card-title ps-3">Info</h2>
                <ul class="card-body list-unstyled">
                    <li>
                        <h5>Publisher</h5>
                        {{ $game->publisher }}
                    </li>
                    <li class="my-3">
                        <h5>Developer</h5>
                         {{ $game->developer }}
                        </li>
                    <li class="my-3">
                        <h5>Genres</h5>
                        {{ $game->genres }}
                    </li>
                    <li class="my-3">
                        <h5>Platforms</h5>
                        {{ $game->platform }}
                    </li>
                    <li>
                        <h5>Date</h5>
                        {{ $game->year }}
                    </li>
                </ul>
            </div>
            <div class="card p-3">
                <h2 class="card-title ps-3">Commercial</h2>
                <ul class="card-body list-unstyled">
                    <li>
                        <h5>Region</h5> 
                        {{ $game->region }}
                    </li>
                    <li class="my-3">
                        <h5>Sales</h5> 
                        {{ $game->sales }}
                    </li>
                    <li class="my-3">
                        <h5>Price</h5>
                        {{ $game->price }} €
                    </li>
                    <li class="my-3">
                        <h5>Score</h5> 
                        {{ $game->score }}
                    </li>
                    <li class="my-3">
                        <h5>Available</h5>
                        {{ $game->is_available == '1' ? 'Yes' : 'No' }}
                    </li>
                    <li>
                        <h5>Downloads</h5> 
                        {{ $game->downloads }}
                    </li>
                </ul>
            </div>
            <div class="card p-3">
                <h2 class="card-title ps-3">Pegi</h2>
                <ul class="card-body list-unstyled">
                    @if ($game->violence == 1)
                       <li class="my-2 tags pegi">Violence</li> 
                    @endif
                    @if ($game->bad_language == 1)
                       <li class="my-2 tags pegi">Bad Language</li> 
                    @endif
                    @if ($game->fear == 1)
                       <li class="my-2 tags pegi">Fear</li> 
                    @endif
                    @if ($game->gambling == 1)
                        <li class="my-2 tags pegi">Gambling</li>
                    @endif
                    @if ($game->sex == 1)
                        <li class="my-2 tags pegi">Sex</li>
                    @endif
                    @if ($game->drugs == 1)
                        <li class="my-2 tags pegi">Drugs</li>
                    @endif
                    @if ($game->discriminations == 1)
                        <li class="my-2 tags pegi">Discriminations</li>
                    @endif
                </ul>
            </div>
            <div class="card p-3">
                <h2 class="card-title ps-3">Tags</h2>
                <ul class="card-body list-unstyled">
                    @if ($game->single_player == 1)
                       <li class="my-2 tags typo">Single Player</li> 
                    @endif
                    @if ($game->multiplayer == 1)
                       <li class="my-2 tags typo">Multiplayer</li> 
                    @endif
                    @if ($game->online_pvp == 1)
                       <li class="my-2 tags typo">Online PVP</li> 
                    @endif
                    @if ($game->online_coop == 1)
                        <li class="my-2 tags typo">Online COOP</li>
                    @endif
                    <li class="my-2 tags typo">{{ $game->supported_languages }}</li>
                    @if ($game->is_dlc == 1)
                        <li class="my-2 tags typo">DLC</li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="card p-3 text-center">
            <h2 class="mt-3 mb-4">Minimum System Required</h2>
            <ul class="card-body list-unstyled fs-5 row row-cols-5">
                <li class="card p-2">
                    <h4>Operation System</h4>
                    {{ $game->minimum_operating_system }}
                </li>
                <li class="card p-2">
                    <h4>RAM</h4>
                    {{ $game->minimum_memory_ram }} GB
                </li>
                <li class="card p-2">
                    <h4>GPU V-RAM</h4>
                    {{ $game->minimum_gpu }} GB
                </li>
                <li class="card p-2">
                    <h4>CPU Core</h4>
                    {{ $game->minimum_cpu }}
                </li>
                <li class="card p-2">
                    <h4>Space</h4>
                    {{ $game->space_required }} GB
                </li>
            </ul>
        </div>


    </div>
@endsection
