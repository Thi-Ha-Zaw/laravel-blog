@extends('layouts.master')

@section('content')
    @include('layouts.category-nav')
    {{-- <div>
        <div class=" d-flex justify-content-between align-items-start mt-3 mb-5">
            categories list
            <div class="">
                <div class=" d-flex gap-3">
                    <a href="{{ route('index') }}" class=" btn btn-outline-dark category-link btn-sm active">
                        All Categories
                    </a>
                    @foreach (App\Models\Category::all() as $category)
                        <a href="{{ route('categorized', $category->slug) }}" class=" category-link btn btn-outline-dark btn-sm ">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>

            search bar
            <div class="">
                <form action="">
                    <div class=" input-group">
                        <input type="text" name="keyword" value="{{ request()->keyword }}" class=" form-control">
                        <button class=" btn btn-dark">
                            <i class=" bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    search articles with search bar

    @if (request()->has('keyword'))
        <div class=" justify-content-between d-flex">
            <p class=" fw-bold">Showing articles searched by ' <span class=" font-italic">{{ request()->keyword }}</span>'
            </p>
            <a href="{{ route('index') }}" class=" text-dark">See All</a>
        </div>
    @endif


    swiper

    <h4>Latest Articles</h4>
    <div class=" card border-0 mb-3 shadow-0">
        <div class="card-body">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        Latest Articles Card
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://img.thedailybeast.com/image/upload/c_crop,d_placeholder_euli9k,h_630,w_1120,x_47,y_0/dpr_2.0/c_limit,w_740/fl_lossy,q_auto/v1685994244/apple-vision-pro__cctkg4nhnb7m_og_jdabth"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://img.freepik.com/free-photo/hightech-helmets-humanoid-being-generative-ai_8829-2879.jpg?w=740&t=st=1689350936~exp=1689351536~hmac=9357bd10d90442f5d583cb9833122532c78ab62e82ac5ce09b9286ea887a2d32"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://www.analyticsinsight.net/wp-content/uploads/2021/07/Technology-Can-Boost-Your-Business-Productivity.jpg"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://img.freepik.com/free-photo/ai-nuclear-energy-future-innovation-disruptive-technology_53876-129784.jpg?w=360&t=st=1689350858~exp=1689351458~hmac=0437ae39ec88addfd4216f47217c517c918c5f70096083bc7a21c06a2d0a1ce0"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://img.freepik.com/free-photo/group-diverse-grads-throwing-caps-up-sky_53876-56031.jpg?w=1060&t=st=1689350772~exp=1689351372~hmac=c55e2580728aec8900dbd5756a0e9138b11cb021d9678c0bb4ad4e11e2faf7d2"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://img.freepik.com/free-photo/shiny-night-city_1127-8.jpg?w=1060&t=st=1689350178~exp=1689350778~hmac=e2fb10c8564864213db90efdb50249c290312312b909c549bca2e89743f85ca5"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://img.freepik.com/free-photo/green-field-tree-blue-skygreat-as-backgroundweb-banner-generative-ai_1258-158251.jpg?w=1380&t=st=1689350307~exp=1689350907~hmac=f811d038d68ee9f0502f83bd67f20773aeed5ff944b12c04d8f5e0d215bc36e0"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class=" latestArticle">
                            <div class="">
                                <img src="https://img.freepik.com/free-photo/wet-vietnam-mountain-flow-stream-rural_1417-1357.jpg?w=1060&t=st=1689350341~exp=1689350941~hmac=1ce166ceb32254d4e2265f03f02fd83965e4ec72475b7ec415ba729958641842"
                                    alt="" class=" w-100 rounded-2">
                            </div>
                            <div class="latestArticle-detail rounded-2">
                                <div class=" latestArticle-category p-3">
                                    <h4 class=" badge badge-dark">Food</h4>
                                </div>
                                <div class=" latestArticle-text p-3">
                                    <h5 class=" text-white mb-1">Apple Vision Pro is released now</h5>
                                    <p class=" text-white-50 small">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        nemo, totam facere velit vitae ipsa aperiam nisi earum excepturi omnis quibusdam
                                        dicta!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div> --}}

    {{-- for displaying aritcles  --}}

    @forelse ($articles as $article)
        <div class="card  border-0 shadow p-3 mb-3">
            <div class="card-body">
                <h3 class=" mb-2">
                    <a href="{{ route('detail', $article->slug) }}"
                        class=" text-decoration-none text-dark">{{ $article->title }}</a>
                </h3>
                <div class=" mb-4">
                    <span class=" badge bg-black">{{ $article->user?->name }}</span>
                    <span class=" badge bg-black">{{ $article->category->title ?? 'Unknown' }}</span>
                    <span class=" badge bg-black">{{ $article->created_at->format('d M Y') }}</span>
                </div>
                <p class=" text-black-50">{{ $article->excert }}</p>
                <a href="{{ route('detail', $article->slug) }}" class=" btn btn-dark px-4 py-1 mt-2">See More</a>
            </div>
        </div>
    @empty
        <div class=" justify-content-center d-flex mt-5">
            <div class=" w-75 shadow-sm p-5 text-center">
                <h3 class=" mb-4">There is no articles.Try Now</h3>
                <a href="{{ route('register') }}" class=" btn btn-dark px-5">Try Now</a>
            </div>
        </div>
    @endforelse
    <div class="">
        {{ $articles->onEachSide(1)->links() }}
    </div>
@endsection

@vite(['resources/js/swiper.js'])
