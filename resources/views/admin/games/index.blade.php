@extends('layouts.app')

@section('page.title')
    Movies
@endsection

@section('page.main')
    <div class="container my-5">
        <a href="{{ route('admin.games.create') }}" class="btn btn-sm btn-primary">Create new game</a>
        <table class="table table-hover align-middle">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Developer</th>
                <th scope="col">Genres</th>
                <th scope="col">Platform</th>
                <th scope="col">Price €</th>
                <th scope="col">Info</th>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr onclick="window.location='{{ route('admin.games.show', $game->id) }}'" style="cursor: pointer">
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->developer->name }}</td>
                        <td>{{ $game->genres }}</td>
                        <td>{{ $game->platform }}</td>
                        <td>{{ $game->price }}</td>
                        <td colspan="3">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.games.show', $game->id) }}"
                                    class="btn btn-sm border-dark">Detail</a>
                                <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $game->id }}" onclick="event.stopPropagation()">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="delete{{ $game->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>DELETE PROJECT: {{ $game->title }}</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.games.destroy', $game->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
