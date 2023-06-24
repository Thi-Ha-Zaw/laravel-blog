@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row justify-content-center mt-3">
            <div class="col-10">
                <h1 class=" mb-4">Article Lists</h1>
                <a href="{{ route('article.create') }}" class=" btn btn-dark mb-4">Create</a>
                <table class=" table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Category</th>
                            @can('admin-only')
                                <th>Owner</th>
                            @endcan
                            <th>Control</th>
                            <th>Updated_at</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    {{ $article->title }}
                                    <br>
                                    <span class=" small text-black-50">
                                        {{ Str::limit($article->description, 50, '...') }}
                                    </span>
                                </td>
                                <td>{{ $article->category->title ?? "Unknown" }}</td>
                                @can("admin-only")
                                    <td>{{ $article->user->name ?? "Unknown" }}</td>
                                @endcan
                                <td>
                                    <div class=" btn-group btn-group-sm">
                                        <a class=" btn btn-outline-dark" href="{{ route('article.show', $article->id) }}">
                                            <i class=" bi bi-info"></i>
                                        </a>
                                        @can('article-update', $article)
                                            <a class=" btn btn-outline-dark" href="{{ route('article.edit', $article->id) }}">
                                                <i class=" bi bi-pencil"></i>
                                            </a>
                                        @endcan
                                        @can('article-delete', $article)
                                            <button type="submit" form="articleDelForm{{ $article->id }}"
                                                class=" btn btn-outline-dark">
                                                <i class=" bi bi-trash3"></i>
                                            </button>
                                        @endcan

                                    </div>
                                    <form id="articleDelForm{{ $article->id }}" method="post"
                                        action="{{ route('article.destroy', $article->id) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                                <td>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-clock"></i>
                                        {{ $article->updated_at->format("h:i a") }}
                                    </p>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $article->updated_at->format("d M Y") }}
                                    </p>
                                </td>
                                <td>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-clock"></i>
                                        {{ $article->created_at->format("h:i a") }}
                                    </p>
                                    <p class=" mb-0 small">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $article->created_at->format("d M Y") }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr class=" text-center">
                                <td colspan="5">
                                    <h3>There is no Articles</h3>
                                    <a href="{{ route('article.create') }}" class=" btn btn-dark">Create New</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $articles->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
