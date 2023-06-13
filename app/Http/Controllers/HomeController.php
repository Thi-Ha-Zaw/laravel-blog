<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function users(){

        $users = User::when(request()->has("keyword"),function($query){
            $keyword = request()->keyword;
            $query->where("title","like","%".$keyword."%");
            $query->orWhere("description","like","%".$keyword."%");
        })
        ->when(request()->has("title"),function($query){
            $sortKey = request()->title ?? "asc";
            $query->orderBy("name",$sortKey);
        })
        ->latest("id")
        ->paginate(7)->withQueryString();
        return view("users",compact('users'));
    }
}
