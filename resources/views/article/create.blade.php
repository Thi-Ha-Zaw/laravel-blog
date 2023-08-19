@extends('layouts.dashboard')


@section('content')
    <div class=" row justify-content-center bg-white shadow rounded mt-5 mx-md-3 mx-0 py-5">
        <div class=" col-12 col-md-10">
            @if (auth()->user() && auth()->user()->is_banned)
                <div class="alert alert-dark">
                    You are currently banned and cannot create articles.
                </div>
            @else
                {{-- <h1 class="  my-5">Create Articles</h1> --}}
                <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data" id="createArticle">
                    @csrf
                    <div class="row align-items-center g-5">

                        {{-- for uploading title,category,description UI --}}
                        <div class="col-8">
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
                                <textarea name="description" rows="10" class=" form-control @error('description') is-invalid @enderror">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                    <div class=" text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class=" form-label" for="">Thumbnail</label>
                                <div
                                    class=" border bg-light rounded single-photo-update d-flex justify-content-center align-items-center">
                                    <div class=" text-center upload-logo">
                                        <i class=" bi bi-upload"></i>
                                        <p class=" mb-0">Click To Upload</p>
                                    </div>
                                </div>

                                <input form="createArticle" type="file" accept="image/jpeg,image/png"
                                    class=" real-upload d-none form-control @error('thumbnail') is-invalid @enderror"
                                    name="thumbnail">
                                @error('thumbnail')
                                    <p class=" text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class=" btn btn-dark">Save Article</button>
                </form>
            @endif
        </div>
    </div>

@endsection

@push('script')
    @vite(['resources/js/single-upload.js'])
@endpush

