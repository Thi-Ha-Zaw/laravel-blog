<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Contracts\Database\Eloquent\Builder;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::when(request()->has("keyword"), function ($query) {
            $query->where(function (Builder $builder) {
                $keyword = request()->keyword;
                $builder->where("title", "like", "%" . $keyword . "%");
                $builder->orWhere("description", "like", "%" . $keyword . "%");
            });
        })
            ->when(Auth::user()->role === "user", function ($query) {
                $query->where("user_id", Auth::id());
            })
            ->when(request()->has("title"), function ($query) {
                $sortKey = request()->title ?? "asc";
                $query->orderBy("name", $sortKey);
            })
            ->latest("id")
            ->paginate(7)->withQueryString();

        return view("article.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {

        // return $request;
        $savedThumbnail = null;
        if($request->hasFile('thumbnail')){
            // dd($request->file('thumbnail')->extension());
            $savedThumbnail = $request->file("thumbnail")->store("public/thumbnail");
            // $thumbnail = $request->file("thumbnail");
            // $savedThumbnail = $thumbnail->storeAs("public","hello.".$thumbnail->extension());
            // $request->thumbnail;
            // return $savedThumbnail;
        }

        $article = Article::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "description" => $request->description,
            "excert" => Str::words($request->description, 50, '...'),
            "thumbnail" => $savedThumbnail,
            "category_id" => $request->category,
            "user_id" => Auth::id()
        ]);
        return redirect()->route("article.index")->with("message", $article->title . "is created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view("article.show", compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        Gate::authorize('update', $article);


        return view("article.edit", compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        Gate::authorize('update', $article);

        $savedThumbnail = $article->thumbnail;
        if($request->hasFile('thumbnail')){
            Storage::delete($article->thumbnail);

            $savedThumbnail = $request->file("thumbnail")->store("public/thumbnail");

        }

        $article->update([
            "title" => $request->title,
            "category_id" => $request->category,
            "slug" => Str::slug($request->title),
            "description" => $request->description,
            "excert" => Str::words($request->description, 50, '...'),
            "thumbnail" => $savedThumbnail
        ]);

        return redirect()->route("article.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        Gate::authorize('delete', $article);

        $article->delete();
        return redirect()->back();
    }
}
