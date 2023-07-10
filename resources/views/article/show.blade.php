@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class=" col-12">
                <div >
                    <h3 class=" my-4">Article Detail</h3>
                    <a href="{{ route('article.create') }}" class=" btn btn-outline-dark">Create Article</a>
                    <a href="{{ route('article.index') }}" class=" btn btn-outline-dark">Article List</a>
                    <h1 class="my-4">{{ $article->title }}</h1>
                    <p style="word-wrap: break-word">{{ $article->description }}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
