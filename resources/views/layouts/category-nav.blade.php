{{-- search articles with search bar --}}

{{-- @if (request()->has('keyword'))
    <div class=" justify-content-between d-flex">
        <p class=" fw-bold">Showing articles searched by ' <span class=" font-italic">{{ request()->keyword }}</span>'
        </p>
        <a href="{{ route('index') }}" class=" text-dark">See All</a>
    </div>
@endif --}}


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
                        {{ $category->title }}
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
                <div class="swiper-slide ">
                    {{-- Latest Articles Card --}}
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
                            <img src="https://www.justinjoyce.dev/content/images/size/w1140/2023/07/ben-white-qDY9ahp0Mto-unsplash.jpg"
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
                            <img src="https://img.freepik.com/free-photo/peak-bamboo-lijiang-rural-mist_1417-410.jpg?w=1060&t=st=1690558015~exp=1690558615~hmac=4edd9c139de39fb0aae96dd5cf562c4bfdb87072e094cbce2d599a36b603c1af"
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
                <div class="swiper-slide">
                    <div class=" latestArticle">
                        <div class="">
                            <img src="https://img.freepik.com/free-photo/asian-boy-three-little-girls-student-uniform-sitting-grass-enjoy-play-hand-game-together-they-talk-laugh-with-funny-copy-space-rural-lifestyle-concept_1150-55897.jpg?w=1380&t=st=1690730948~exp=1690731548~hmac=e03facd5e0b4bbb7bddfa4b008633253b3b95474cdba064e9606ed804b5f9afa"
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
            <div class="swiper-pagination d-none"></div>
        </div>
    </div>
</div>

@vite(['resources/js/swiper.js','resources/js/scrollAnimate.js'])
