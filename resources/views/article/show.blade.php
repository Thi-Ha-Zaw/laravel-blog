@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-2 jcc">
            <div class=" col-12">
                <div>
                    {{-- <h3 class=" my-4">Article Detail</h3> --}}
                    {{-- <a href="{{ route('article.create') }}" class=" my-4 btn btn-outline-dark">Create Article</a> --}}
                    {{-- <a href="{{ route('article.index') }}" class=" btn btn-outline-dark">Article List</a> --}}
                    <h3 class="my-4">{{ $article->title }}</h3>
                    <div class=" my-3">
                        @if ($article->thumbnail)
                            <img class=" rounded detail-thumbnail" src="{{ asset(Storage::url($article->thumbnail)) }}"
                                alt="">
                        @else
                            <img class=" rounded detail-thumbnail "
                                src="https://raw.githubusercontent.com/julien-gargot/images-placeholder/master/placeholder-square.png"
                                alt="">
                        @endif
                    </div>
                    <p style="word-wrap: break-word">{{ $article->description }}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
