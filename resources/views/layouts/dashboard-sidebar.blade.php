<div class=" d-flex flex-column vh-100 overflow-scroll bg-white p-3 " id="sideBar">
    <div class="mx-auto mb-3">
        {{-- <img src="https://coderthemes.com/hyper/saas/assets/images/logo.png" alt="" height="22px"> --}}
    </div>
    <div class="">
        <ul class="">
            <li class=" text-secondary mt-4" style="font-size: 12px;">
                <a href="#" class="text-decoration-none  text-secondary">NAVIGATION</a>
            </li>
            <li class=" ps-3">
                <ul>
                    <li class="sidebar-item  text-secondary  pt-4">
                        <div>
                            <i class=" bi bi-house pe-3"></i>
                            <a href="{{ route('index') }}"
                                class="text-decoration-none  text-secondary sidebar-link">Home
                                Page</a>
                        </div>

                    </li>
                </ul>
            </li>
            <li class=" text-secondary mt-4" style="font-size: 12px;">
                <a href="#" class="text-decoration-none  text-secondary">APPS</a>
            </li>

            <li class=" ps-3">
                <ul>
                    @auth
                        <li class="sidebar-item  text-secondary pt-4 {{request()->url() == "http://127.0.0.1:8000/dashboard/article/create" ? 'sidebar-item-active' : null}}">
                            <a href="{{ route('article.create') }}"
                            class="  text-secondary text-decoration-none sidebar-link">
                            <div class="">
                                <div class="">
                                    <i class="bi bi-pen pe-3"></i>
                                    <span>
                                       Create
                                            Article
                                    </span>
                                </div>
                            </div>
                        </a>
                        </li>
                        <li class="sidebar-item  text-secondary {{request()->url() == "http://127.0.0.1:8000/dashboard/article" ? 'sidebar-item-active' : null}} pt-4">
                            <a href="{{ route('article.index') }}"
                                class="  text-secondary text-decoration-none sidebar-link">
                                <div class="">
                                    <div class="">
                                        <i class="bi bi-text-right pe-3"></i>
                                        <span>
                                            Article List
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @can('viewAny', App\Models\Category::class)
                            <li class="sidebar-item  text-secondary pt-4 {{request()->url() == "http://127.0.0.1:8000/dashboard/category/create" ? 'sidebar-item-active' : null}}">
                                <a href="{{ route('category.create') }}"
                                class="  text-secondary text-decoration-none sidebar-link">
                                <div class="">
                                        <i class="bi bi-pencil pe-3"></i>
                                        <span>
                                           Create
                                                Category
                                        </span>
                                </div>
                            </a>
                            </li>
                            <li class="sidebar-item  text-secondary pt-4 {{request()->url() == "http://127.0.0.1:8000/dashboard/category" ? 'sidebar-item-active' : null}}">
                                <a href="{{ route('category.index') }}"
                                                class="  text-secondary text-decoration-none sidebar-link">
                                <div class="">
                                    <div class="">
                                        <i class="bi bi-grid-fill pe-3"></i>
                                        <span>
                                             Category
                                                List
                                        </span>
                                    </div>
                                </div>
                            </a>
                            </li>
                        @endcan
                        @can('admin-only')
                            <li class="sidebar-item  text-secondary pt-4 {{request()->url() == "http://127.0.0.1:8000/dashboard/users" ? 'sidebar-item-active' : null}}">
                                <a href="{{ route('users') }}"
                                                class="  text-secondary text-decoration-none sidebar-link">
                                <div class="">
                                    <div class="">
                                        <i class="bi bi-person pe-3"></i>

                                        <span>
                                            User
                                        </span>

                                    </div>
                                </div>
                            </a>
                            </li>
                        @endcan

                    @endauth
                </ul>
            </li>
        </ul>
    </div>
</div>


