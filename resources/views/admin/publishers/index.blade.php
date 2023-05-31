@extends('layouts.app')

@section('page.title')
    Developers
@endsection

@section('page.main')
    <div class="container my-5">
        <a href="{{ route('admin.publishers.create') }}" class="btn btn-sm btn-primary">Add new publishers</a>
        
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
        
        <table class="table table-hover align-middle">
            <thead>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr onclick="window.location='{{ route('admin.publishers.show', $publisher->id) }}'" style="cursor: pointer">
                        <td>{{ $publisher->id }}</td>
                        <td>{{ $publisher->name }}</td>
                        <td colspan="3">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.publishers.show', $publisher) }}"
                                    class="btn btn-sm border-dark">Detail</a>
                                <a href="{{ route('admin.publishers.edit', $publisher) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $publisher->id }}" onclick="event.stopPropagation()">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="delete{{ $publisher->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>DELETE PROJECT: {{ $publisher->name }}</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.publishers.destroy', $publisher->id) }}" method="POST">
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
