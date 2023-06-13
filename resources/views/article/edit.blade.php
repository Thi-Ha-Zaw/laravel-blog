@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-8">
                <h1 class="  my-5">Edit Articles</h1>
                <form action="{{route("article.update",$article->id)}}" method="post">
                    @csrf
                    @method("put")
                    <div class=" mb-3">
                        <label for="" class=" form-label fs-5">Title</label>
                        <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title',$article->title) }}">
                        @error('title')
                            <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="" class=" form-label">Select Category</label>
                        <select name="category" class=" form-select @error('category') is-invalid @enderror">
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category',$article->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <textarea name="description" rows="7" class=" form-control @error('description') is-invalid @enderror">
                            {{ old('description',$article->description) }}
                        </textarea>
                        @error('description')
                            <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class=" btn btn-dark">Edit Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
