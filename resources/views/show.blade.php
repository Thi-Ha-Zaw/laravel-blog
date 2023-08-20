@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class=" col-lg-10 col-12">
            <div class="">
                <h3 class=" mb-2 ms-lg-4">
                    {{ $article->title }}
                </h3>
                <div class=" mb-4 ms-lg-4">
                    <span class=" badge bg-black">{{ $article->category->title ?? 'Unknown' }}</span>
                    <span class=" badge bg-black">{{ $article->created_at->format('d M Y') }}</span>
                    <span class=" badge bg-black">{{ $article->user?->name }}</span>
                    @if ($article->user->role == 'admin')
                        <img src="{{ asset('images/bluemark.png') }}" alt="" height="20px">
                    @endif
                </div>
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
                            <img src="{{ asset(Storage::url($photo->address)) }}" class=" glider-img rounded ms-lg-4"
                                alt="image alt" />
                        </div>
                    @endforeach
                @endif
                <p class=" text-black-50 ms-lg-4" style="word-wrap: break-word">{{ $article->description }}</p>


                @if (auth()->user() && auth()->user()->is_banned)
                    <div class="alert alert-dark">
                        You are currently banned and cannot perform comment Actions.
                    </div>
                @else
                    @include('layouts.comment')
                    @auth
                        <div>
                            <form id="comment-form" action="{{ route('comment.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <textarea name="content" rows="4" class=" form-control" placeholder="Say Something about this article....."></textarea>
                                <div class=" d-flex justify-content-between align-items-end mt-2">
                                    <p class=" mb-0">Commenting as {{ Auth::user()->name }}</p>
                                    <button class=" btn btn-sm btn-dark">Comment</button>
                                </div>
                            </form>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </div>
@endsection

@push('script')
    @auth
        <script>
            window.Laravel = {!! json_encode([
                'isAuthenticated' => Auth::check(),
                'userId' => Auth::id(),
                'adminId' => $adminId,
                'userName' => Auth::user()->name,
            ]) !!};
            window.LaravelToken = {
                csrfToken: '{{ csrf_token() }}',

            }
        </script>
    @endauth
@endpush
@vite(['resources/js/gliderInDetail.js'])
