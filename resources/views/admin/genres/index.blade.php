@extends('layouts.app')

@section('page.title')
    Movies
@endsection

@section('page.main')
    <div class="container my-5">
        <a href="{{ route('admin.genres.create') }}" class="btn btn-sm btn-primary">Create new Genre</a>
        
        {{-- Message for create and update TAGS --}}
        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3" id="message">
                <div class="toast show align-items-center my-bg-success border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex py-2">
                        <div class="toast-body fw-bold">
                            {{ session('message') }}
                        </div>
                        <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        {{-- TAG'S Table --}}
        <table class="table table-hover align-middle">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Info</th>
            </thead>
            <tbody>
                {{-- Cicle on list of Tags --}}
                @foreach ($genres as $genre)
                    {{-- table row --}}
                    <tr onclick="window.location='{{ route('admin.genres.show', $genre->id) }}'" style="cursor: pointer">
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>{{ $genre->slug }}</td>
                        <td colspan="3">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.genres.show', $genre->id) }}"
                                    class="btn btn-sm border-dark">Detail</a>
                                <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $genre->id }}" onclick="event.stopPropagation()">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    {{-- /table row --}}

                    {{-- Modal for delete --}}
                    <div class="modal fade" id="delete{{ $genre->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>DELETE PROJECT: {{ $genre->name }}</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST">
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
                    {{-- -------- --}}
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
