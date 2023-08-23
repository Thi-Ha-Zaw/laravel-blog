@extends('layouts.master')

@section('content')
    @include('layouts.category-nav')

    <div class="row mt-5">
        @forelse ($articles as $article)
            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{ route('detail', $article->slug) }}" class=" text-decoration-none text-dark">
                    <div class="card slide-down  border-0 shadow p-3 mb-3 blog-card">
                        <div class="card-body p-0 d-flex flex-column">
                            <h3 class=" mb-2 text-truncate">
                                {{ $article->title }}
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
                            <a href="{{ route('detail', $article->slug) }}" class=" btn btn-dark px-4 py-1 mt-2 mt-auto">See
                                More</a>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class=" justify-content-center d-flex mt-5">
                <div class=" w-75 shadow-sm p-5 text-center">
                    <h3 class=" mb-4">There is no articles.Try Now</h3>
                    <a href="{{ route('register') }}" class=" btn btn-dark px-5">Try Now</a>
                </div>
            </div>
        @endforelse
    </div>
    <div class="">
        {{ $articles->onEachSide(1)->links() }}
    </div>
@endsection

@vite(['resources/js/swiper.js', 'resources/js/scrollAnimate.js'])
