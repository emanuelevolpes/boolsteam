@extends('layouts.app')

@section('page.title')
Movies
@endsection

@section('page.main')
    <div class="container my-5">
        <table class="table align-middle">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Publisher</th>
                <th scope="col">Genres</th>
                <th scope="col">Platform</th>
                <th scope="col">Price €</th>
                <th scope="col">Info</th>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->publisher }}</td>
                        <td>{{ $game->genres }}</td>
                        <td>{{ $game->platform }}</td>
                        <td>{{ $game->price }}</td>
                        <td colspan="3">
                            <div class="d-flex gap-2">
                                <a href="{{ route('games.show', $game->id) }}" class="btn btn-sm border-dark">Detail</a>
                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection