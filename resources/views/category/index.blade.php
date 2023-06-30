@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <h1 class=" mb-4">Category Lists</h1>
                <a href="{{ route('category.create') }}" class=" btn btn-dark mb-4">Create</a>
                <table class=" table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Control</th>
                            <th>Updated_at</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    {{ $category->title }}
                                </td>
                                <td>{{ $category->user->name}}</td>
                                <td>
                                    <div class=" btn-group btn-group-sm">
                                        @can("update",$category)
                                            <a class=" btn btn-outline-dark" href="{{ route('category.edit', $category->id) }}">
                                                <i class=" bi bi-pencil"></i>
                                            </a>
                                        @endcan
                                        @can("delete",$category)
                                            <button type="submit" form="categoryDelForm{{ $category->id }}"
                                                class=" btn btn-outline-dark">
                                                <i class=" bi bi-trash3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                    <form id="categoryDelForm{{ $category->id }}" method="post"
                                        action="{{ route('category.destroy', $category->id) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                                <td>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-clock"></i>
                                        {{ $category->updated_at->format("h:i a") }}
                                    </p>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->updated_at->format("d M Y") }}
                                    </p>
                                </td>
                                <td>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-clock"></i>
                                        {{ $category->created_at->format("h:i a") }}
                                    </p>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->created_at->format("d M Y") }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr class=" text-center">
                                <td colspan="6">
                                    <h3>There is no categoris</h3>
                                    <a href="{{ route('category.create') }}" class=" btn btn-dark">Create New</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
