@extends('layouts.master')

@section('content')
    {{-- @if (request()->has('keyword') && $category->title)
        <div class=" justify-content-between d-flex">
            <p class=" fw-bold">Showing articles searched by ' {{ request()->keyword }} ' and '{{ $category->title }}'
                category</p>
            <a href="{{ route('index') }}" class=" text-dark">See All</a>
        </div>
    @elseif ($category->title)
        <div class=" justify-content-between d-flex">
            <p class=" fw-bold">Showing articles searched by '{{ $category->title }}' category</p>
            <a href="{{ route('index') }}" class=" text-dark">See All</a>
        </div>
    @endif --}}

    @include('layouts.category-nav')


    <div class="row mt-5">
        @forelse ($articles as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card slide-Left border-0 shadow p-3 mb-3 blog-card ">
                    <div class="card-body p-0 d-flex flex-column">
                        <h3 class=" mb-2 text-truncate">
                            <a href="{{ route('detail', $article->slug) }}"
                                class=" text-decoration-none text-dark">{{ $article->title }}</a>
                        </h3>
                        <div class=" mb-4">
                            <span class=" badge bg-black">{{ $article->category->title ?? 'Unknown' }}</span>
                            <span class=" badge bg-black">{{ $article->created_at->format('d M Y') }}</span>
                            <span class=" badge bg-black">{{ $article->user?->name }}</span>
                            @if ($article->user->role == 'admin')
                                <img src="{{ asset('images/bluemark.png') }}" alt="" height="20px">
                            @endif
                        </div>
                        {{-- <p class=" text-black-50">{{ $article->excert }}</p> --}}
                        @if ($article->thumbnail)
                            <img class=" rounded list-thumbnail" src="{{ asset(Storage::url($article->thumbnail)) }}"
                                alt="">
                        @else
                            <img class=" rounded list-thumbnail "
                                src="https://raw.githubusercontent.com/julien-gargot/images-placeholder/master/placeholder-square.png"
                                alt="">
                        @endif
                        <a href="{{ route('detail', $article->slug) }}" class=" btn btn-dark px-4 py-1 mt-auto">See More</a>
                    </div>
                </div>
            </div>
        @empty
            <div class=" justify-content-center d-flex mt-5">
                <div class=" w-75 shadow-sm p-5 text-center">
                    <h3 class=" mb-4">There is no articles.Try Now</h3>
                    <a href="{{ route('article.create') }}" class=" btn btn-dark px-5">Try Now</a>
                </div>
            </div>
        @endforelse
    </div>
    <div class="">
        {{ $articles->onEachSide(1)->links() }}
    </div>
@endsection
