@extends('layouts.master')

@section('content')
    <div class="">
        <h3 class=" mb-2">
            <a href="" class=" text-decoration-none text-dark">{{ $article->title }}</a>
        </h3>
        <div class=" mb-4">
            <span class=" badge bg-black">{{ $article->user?->name }}</span>
            <span class=" badge bg-black">{{ $article->category->title ?? 'Unknown' }}</span>
            <span class=" badge bg-black">{{ $article->created_at->format('d M Y') }}</span>
        </div>
        <p class=" text-black-50">{{ $article->description }}</p>

       @include("layouts.comment")
        @auth
            <div>
                <form action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <textarea name="content" rows="4" class=" form-control" placeholder="Say Something about this article....."></textarea>
                    <div class=" d-flex justify-content-between align-items-end mt-2">
                        <p class=" mb-0">Commenting as {{ Auth::user()->name }}</p>
                        <button class=" btn btn-sm btn-dark">Comment</button>
                    </div>
                </form>
            </div>
        @endauth
    </div>
@endsection