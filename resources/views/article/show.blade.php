@extends("layouts.app")

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <h1 class=" display-3 my-5">{{$article->title}}</h1>
            <p class=" h3">{{$article->description}}</p>
            <div class=" mt-5">
                <p>This post is created at{{$article->created_at->format("d M Y")}} authored by Thi Ha Zaw</p>
            </div>
        </div>
    </div>
</div>

@endsection
