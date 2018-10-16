<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newspaper;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
//    public function store(Newspaper $newspaper)
//    {
//        Comment::create([
//            'comment' => request('comment'),
//            'newspaper_id' => $newspaper->id
//        ]);
//        return back();

//    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->newspaper_id = $request->newspaper_id;
        $comment->user_id = $user->id;
        $comment->save();
        return redirect()->back();
        //return view('newspapers.show');
    }

}
