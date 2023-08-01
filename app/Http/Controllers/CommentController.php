<?php

namespace App\Http\Controllers;

use App\Events\CommentDeleted;
use App\Events\NewCommentPosted;
use App\Events\NewReplyPosted;
use App\Events\ReplyDeleted;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->article_id = $request->article_id;
        if ($request->has("parent_id")) {
            $comment->parent_id = $request->parent_id;
        }
        $comment->user_id = Auth::id();



        $comment->save();

        // event(new NewCommentPosted($comment,auth()->user()->can('delete',$comment)));

        if ($request->has("parent_id")) {
            broadcast(new NewReplyPosted($comment));
        } else {
            broadcast(new NewCommentPosted($comment));
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {


        try {

            $this->authorize("delete", $comment);
            $comment->delete();
            Comment::where('parent_id','=',$comment->id)->delete();
            $allComment = Comment::all();
            if ($comment->parent_id == null) {
                event(new CommentDeleted($allComment,$comment->id));
            } else {
                event(new ReplyDeleted($comment->id));
            }
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }
    }
}
