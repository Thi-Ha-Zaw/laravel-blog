@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-8">
                <h1 class="  my-5">Create Articles</h1>
                <form action="{{route("article.store")}}" method="post">
                    @csrf
                    <div class=" mb-3">
                        <label for="" class=" form-label fs-5">Title</label>
                        <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <textarea name="description" rows="7" class=" form-control @error('description') is-invalid @enderror">
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                            <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class=" btn btn-dark">Save Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
