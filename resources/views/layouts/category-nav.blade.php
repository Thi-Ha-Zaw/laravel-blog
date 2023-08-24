<div class=" mb-5">
    <div class=" row gap-lg-3 gap-4 justify-content-center justify-content-lg-between align-items-start my-3">
        {{-- categories list --}}
        <div class=" col-12 col-lg-8">
            <div class=" slide-down d-flex gap-3 flex-wrap flex-lg-row justify-content-center justify-content-lg-start"
                id="categoryContainer">
                <a href="{{ route('index') }}"
                    class=" btn {{ request('category-slug') != null  ? 'btn-outline-dark' : 'btn-dark' }} btn-sm">
                    All Articles
                </a>
                @foreach (App\Models\Category::all() as $category)
                    <a href="{{ route('categorized', ['slug' => $category->slug, 'category-slug' => $category->slug]) }}"
                        class=" btn  {{ request('category-slug') === $category->slug ? 'btn-dark' : 'btn-outline-dark' }} btn-sm ">
                        {{ $category->title ?? 'Unknown' }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- search bar --}}
        <div class=" col-6 d-none d-lg-block col-lg-3">
            <form action="" class=" slide-down">
                <div class=" input-group">
                    <input type="text" name="keyword" value="{{ request()->keyword }}" class=" form-control">
                    <input type="hidden" name="category-slug" value="{{ request('category-slug') }}">
                    <button class=" btn btn-dark">
                        <i class=" bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>





{{-- swiper --}}

<h4 class=" slide-down">Latest Articles</h4>
<div class="row ">
    <div class=" col-12">
        <div class="swiper mySwiper slide-down">
            <div class="swiper-wrapper">
                @foreach (App\Models\Article::latest("id")->limit(11)->get() as $article)


                <div class="swiper-slide ">
                    {{-- Latest Articles Card --}}
                    <a href="{{route("detail",$article->slug)}}">
                        <div class=" latestArticle">
                            <div class="">
                               @if ($article->thumbnail)
                               <img src="{{asset(Storage::url($article->thumbnail))}}"
                               alt="" class=" w-100 rounded-2">

                               @else
                               <img src="https://raw.githubusercontent.com/julien-gargot/images-placeholder/master/placeholder-square.png"
                               alt="" class=" w-100 rounded-2">

                               @endif
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">{{$article->category->title ?? 'Unknown'}}</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1 text-truncate d-inline-block">{{Str::limit($article->title,40,"...")}}</h5>
                                    <p class=" text-white-50 small">{{Str::limit($article->excert,150,"...")}}</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach
            </div>
            <div class="swiper-pagination d-none"></div>
        </div>
    </div>
</div>

<div>

</div>

@vite(['resources/js/swiper.js','resources/js/scrollAnimate.js'])
