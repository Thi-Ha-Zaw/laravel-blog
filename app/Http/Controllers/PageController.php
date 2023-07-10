<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $articles = Article::when(request()->has("keyword"),function($query){
            $query->where(function (Builder $builder) {
                $keyword = request()->keyword;
                $builder->where("title", "like", "%" . $keyword . "%");
                $builder->orWhere("description", "like", "%" . $keyword . "%");
            });
        })
        ->when(request()->has("category"),function($query){
            $query->where("category_id",request()->category);
        })
        ->when(request()->has("title"),function($query){
            $sortKey = request()->title ?? "asc";
            $query->orderBy("name",$sortKey);
        })
        ->latest("id")
        ->paginate(10)->withQueryString();

        return view("welcome",compact("articles"));
    }

    public function show($slug){
        $article = Article::where("slug",$slug)->firstorFail();
        return view("show",compact('article'));

    }

    public function categorized($slug){
        $category = Category::where("slug",$slug)->firstorFail();
        return view("categorized",[
            "category" => $category,
            "articles" => $category->articles()->when(request()->has("keyword"),function($query){
                $query->where(function (Builder $builder) {
                    $keyword = request()->keyword;
                    $builder->where("title", "like", "%" . $keyword . "%");
                    $builder->orWhere("description", "like", "%" . $keyword . "%");
                });
            })
            ->latest("id")
            ->paginate(10)->withQueryString()
        ]);


    }
}
