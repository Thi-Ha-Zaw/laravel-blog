@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-2 justify-content-center">
            <div class=" col-12 col-lg-10">
                <div>

                    <h3 class="my-4 ms-4">{{ $article->title }}</h3>
                    @if (!$article->photos->isEmpty() && $article->photos->count() > 1)
                        <div class=" mb-3 glider-box">
                            <div class="glider-contain ">
                                <div class=" d-flex align-items-center">
                                    <p aria-label="Prev" class="prev">
                                        <i class=" bi bi-chevron-left fs-1"></i>
                                    </p>
                                    <div class="glider rounded" style="text-align: center;">
                                        @foreach ($article->photos as $photo)
                                            <img src="{{ asset(Storage::url($photo->address)) }}" class=" glider-img"
                                                alt="image alt" />
                                        @endforeach
                                    </div>
                                    <p aria-label="Next" class="next">
                                        <i class=" bi bi-chevron-right fs-1"></i>
                                    </p>
                                </div>
                                <div role="tablist" class="dots"></div>
                            </div>
                        </div>
                    @else
                        @foreach ($article->photos as $photo)
                            <div class=" my-4">
                                <img src="{{ asset(Storage::url($photo->address)) }}" class=" glider-img rounded ms-lg-4" alt="image alt" />
                            </div>
                        @endforeach
                    @endif
                    <p class=" ms-4" style="word-wrap: break-word">{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@vite(['resources/js/gliderInDetail.js'])
