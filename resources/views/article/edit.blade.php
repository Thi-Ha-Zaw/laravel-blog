@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <h3 class=" mb-4">Edit Articles</h3>
                <form id="updateArticle" action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row align-items-center justify-content-between">
                        <div class="col-8">
                            <div class=" mb-3">
                                <label for="" class=" form-label fs-5">Title</label>
                                <input type="text" class=" form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title', $article->title) }}">
                                @error('title')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="" class=" form-label">Select Category</label>
                                <select name="category" class=" form-select @error('category') is-invalid @enderror">
                                    @foreach (\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category', $article->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <textarea name="description" rows="10" class=" form-control @error('description') is-invalid @enderror">
                                {{ old('description', $article->description) }}
                            </textarea>
                                @error('description')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class=" btn btn-dark">Edit Article</button>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class=" form-label" for="">Thumbnail</label>
                                <div style="background-image: url({{ asset(Storage::url($article->thumbnail)) }}); "
                                    class=" border bg-light rounded single-photo-update d-flex justify-content-center align-items-center">
                                    {{-- @if ($article->thumbnail)
                                        <div class="d-flex flex-column">
                                            <img src="{{ asset(Storage::url($article->thumbnail)) }}" style="height: 100px;">
                                            <button class="btn btn-sm btn-danger">
                                                <i class=" bi bi-trash"></i>
                                            </button>
                                        </div>
                                    @endif --}}
                                    <div class=" text-center upload-logo">
                                        <i class=" bi bi-upload"></i>
                                        <p class=" mb-0">Click To Upload</p>
                                    </div>
                                </div>

                                <input form="updateArticle" type="file" accept="image/jpeg,image/png"
                                    class=" real-upload d-none form-control @error('thumbnail') is-invalid @enderror"
                                    name="thumbnail">
                                @error('thumbnail')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('script')
    @vite(['resources/js/single-upload.js'])
@endpush
