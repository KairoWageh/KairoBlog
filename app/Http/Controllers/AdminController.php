<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Event;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersNumber = User::all()->where('isAdmin', '==', '0');
        $postsNumber = Post::all();
        $commentsNumber = Comment::all();

        return view('admin.dashboard')->with('usersNumber', $usersNumber)
            ->with('postsNumber', $postsNumber)->with('commentsNumber', $commentsNumber);
    }

    /**
     * Show all users
     */
    public function users(){
        $users = User::all()->where('isAdmin', '!=', '1');
        return view('admin.users')->with('users', $users);
    }

    /**
     * Search users
     */
    public function searchUsers(Request $request){
        print_r($request->input('id'));
    }

    /**
     * Delete user
     */
    public function deleteUser($userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('admin/users');
    }

    /**
     * Show all posts
     */
    public function posts(){
        $posts = Post::all();
        return view('admin.posts')->with('posts', $posts);
    }

    /**
     * Approve post
     */
    public function approvePost($postId){
        $post = Post::findOrFail($postId)->first();
        $post->is_approved = 1;
        $post->save();
        return redirect('admin/posts');
    }

    /**
     * Approve post
     */
    public function hidePost($postId){
        $post = Post::findOrFail($postId);
        $post->is_approved = 0;
        $post->save();
        return redirect('admin/posts');
    }

    /**
     * Delete post
     */
    public function deletePost($postId){
        $post = Post::findOrFail($postId);
        $post->delete();
        return redirect('admin/posts');
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
    public function destroy(Comment $comment)
    {

    }
}
