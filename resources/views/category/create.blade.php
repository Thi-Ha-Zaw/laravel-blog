@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-8">
                <h1 class="  my-5">Create Category</h1>
                <form action="{{route("category.store")}}" method="post">
                    @csrf
                    <div class=" mb-3">
                        <label for="" class=" form-label fs-5">Title</label>
                        <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class=" btn btn-dark">Save Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection