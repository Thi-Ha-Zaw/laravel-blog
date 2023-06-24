@extends("layouts.master")

@section('content')
    @if (request()->has('keyword') && $category->title)
        <div class=" justify-content-between d-flex">
            <p class=" fw-bold">Showing articles searched by ' {{ request()->keyword }} ' and '{{$category->title}}' category</p>
            <a href="{{ route('index') }}" class=" text-dark">See All</a>
        </div>

        @elseif ($category->title)
        <div class=" justify-content-between d-flex">
            <p class=" fw-bold">Showing articles searched by '{{$category->title}}' category</p>
            <a href="{{ route('index') }}" class=" text-dark">See All</a>
        </div>
    @endif
    @forelse ($articles as $article)
        <div class="card border-0 shadow p-3 mb-3">
            <div class="card-body">
                <h3 class=" mb-2">
                    <a href="{{ route('detail', $article->slug) }}"
                        class=" text-decoration-none text-dark">{{ $article->title }}</a>
                </h3>
                <div class=" mb-4">
                    <span class=" badge bg-black">{{ $article->user?->name }}</span>
                    <span class=" badge bg-black">{{ $article->category->title ?? 'Unknown' }}</span>
                    <span class=" badge bg-black">{{ $article->created_at->format('d M Y') }}</span>
                </div>
                <p class=" text-black-50">{{ Str::words($article->description, 50, '...') }}</p>
                <a href="{{ route('detail', $article->slug) }}" class=" btn btn-dark px-4 py-1 mt-2">See More</a>
            </div>
        </div>
    @empty
        <div class=" justify-content-center d-flex mt-5">
            <div class=" w-75 shadow-sm p-5 text-center">
                <h3 class=" mb-4">There is no articles.Try Now</h3>
                <a href="{{ route('register') }}" class=" btn btn-dark px-5">Try Now</a>
            </div>
        </div>
    @endforelse
    <div class="">
        {{ $articles->onEachSide(1)->links() }}
    </div>
@endsection
