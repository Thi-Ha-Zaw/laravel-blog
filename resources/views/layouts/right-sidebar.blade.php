<div class=" position-sticky" style="top: 50px">

    {{-- search bar  --}}
    <div class=" mb-4">
        <p class=" mb-2">Article Search</p>
        <form action="">
            <div class=" input-group">
                <input type="text" name="keyword" value="{{ request()->keyword }}" class=" form-control">
                <button class=" btn btn-dark">
                    <i class=" bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>

    {{-- categories list  --}}

    <div class=" mb-4">
        <div class=" list-group">
            <a href="{{ route('index') }}" class=" list-group-item transition duration-150 list-group-item-action ">
                All Categories
            </a>
            @foreach (App\Models\Category::all() as $category)
                <a href="{{ route('categorized', $category->slug) }}"
                    class=" list-group-item transition duration-150 list-group-item-action ">
                    {{ $category->title }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- Latest Articles  --}}
    <div class=" mb-4">
        <p class=" mb-2">Recent Articles</p>
        <div class=" list-group">
            @foreach (App\Models\Article::latest('id')->limit(5)->get() as $article)
                <a href="{{ route('detail', $article->slug) }}"
                    class=" list-group-item transition duration-150 list-group-item-action ">
                    {{ $article->title }}
                </a>
            @endforeach
        </div>
    </div>

</div>
