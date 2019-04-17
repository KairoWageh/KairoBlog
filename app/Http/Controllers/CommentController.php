<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Validator;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $validator = Validator::make($request->all(), [
            'commentBody' => 'required|max:200'
        ])->validate();
        //if($request->ajax()) {
            if($validator){
                $comment = new Comment();
                $comment->comment_body = $request->commentBody;
                $comment->user_id = Auth::user()->id;
                $comment->user_name = Auth::user()->name;
                $comment->post_id = $postId;
                $comment->save();
            }
//        }else{
//            return view('login');
//        }
        return redirect('post/'.$postId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $post = Post::where('id', '=', $comment->post_id)->first();
        $comment->delete();
        return redirect('/post/'.$post->id);
    }
}
