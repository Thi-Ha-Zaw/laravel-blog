@extends('layouts.dashboard')


@section('content')
    <div class=" row justify-content-center bg-white shadow rounded mt-5 mx-md-3 mx-0 py-5">
        <div class=" col-12 col-md-8">
            @if (auth()->user() && auth()->user()->is_banned)
                <div class="alert alert-dark">
                    You are currently banned and cannot create articles.
                </div>
            @else
                {{-- <h1 class="  my-5">Create Articles</h1> --}}
                <form action="{{ route('article.store') }}" method="post">
                    @csrf
                    <div class=" mb-3">
                        <label for="" class=" form-label fs-5">Title</label>
                        <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="" class=" form-label">Select Category</label>
                        <select name="category" class=" form-select @error('category') is-invalid @enderror">
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>
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
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                            <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class=" btn btn-dark">Save Article</button>
                </form>
            @endif
        </div>
    </div>

@endsection
