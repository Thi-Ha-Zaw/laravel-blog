@extends('layouts.dashboard')

@section('content')
    <div class=" row mt-4 mx-md-2  mx-0">
        @if (auth()->user() && auth()->user()->is_banned)
            <div class="alert alert-dark w-75">
                You are currently banned and cannot perform certain actions....
            </div>
        @else
            @forelse ($articles as $article)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card border-0 shadow p-3 mb-3 blog-card">
                        <div class=" text-end">

                            <div class="dropdown">
                                <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class=" bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item">
                                        @can('update', $article)
                                            <a class=" btn btn-outline-dark btn-sm px-5" href="{{ route('article.edit', $article->id) }}">
                                                <i class=" bi bi-pencil"></i>
                                                <span>Edi</span>
                                            </a>
                                        @endcan
                                    </li>
                                    <li class=" dropdown-item">
                                        @can('delete', $article)
                                            <button type="submit" form="articleDelForm{{ $article->id }}"
                                                class=" btn btn-outline-dark btn-sm px-5">
                                                <i class=" bi bi-trash3"></i>
                                                <span>Del</span>
                                            </button>
                                        @endcan
                                        <form id="articleDelForm{{ $article->id }}" method="post"
                                            action="{{ route('article.destroy', $article->id) }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body  d-flex flex-column">

                            <h3 class=" mb-2">
                                <a href="{{ route('detail', $article->slug) }}"
                                    class=" text-decoration-none d-block text-dark text-truncate">{{ $article->title }}</a>
                            </h3>
                            <div class=" mb-4">

                                <span class=" badge bg-black">{{ $article->category->title ?? 'Unknown' }}</span>
                                <span class=" badge bg-black">{{ $article->created_at->format('d M Y') }}</span>
                                <span class=" badge bg-black">{{ $article->user?->name }}</span>
                                @if ($article->user->role == "admin")
                                <img src="{{asset('images/bluemark.png')}}" alt="" height="20px">
                                @endif
                            </div>
                            <p class=" text-black-50"> {{ Str::limit($article->description, 200, '...') }}</p>
                            <a href="{{ route('article.show', $article->id) }}"
                                class=" btn btn-dark px-4 py-1 mt-2 mt-auto">See More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class=" col-md-6 col-12">
                            <div class="card p-5 shadow">
                                <div class="card-body text-center">
                                    <h3 class=" mb-3">There is no Articles</h3>
                                    <a href="{{ route('article.create') }}" class=" btn btn-dark">Create New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
            <div class=" mt-3">
                {{ $articles->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
@endsection
