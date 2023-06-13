@extends("layouts.app")

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <h3 class=" my-4">Article Detail</h3>
            <a href="{{route("article.create")}}" class=" btn btn-outline-dark">Create Article</a>
            <a href="{{route("article.index")}}" class=" btn btn-outline-dark">Article List</a>
            <h1 class="my-4">{{$article->title}}</h1>
            <p class="">{{$article->description}}</p>
            
        </div>
    </div>
</div>

@endsection
