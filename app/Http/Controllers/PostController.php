<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use File;
use Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * Display all user posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $myPosts = Post::with('comments')->where('user_id', '=', $userId)->get();
        return view('posts.myPosts')->with('myPosts', $myPosts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postTitle' => 'required|min:3|max:100',
            'postImage' => 'required|image|mimes:jpg|max:2048',
            'postContent' => 'required|min:50|max:1000'
        ])->validate();
        $userId = Auth::user()->id;
        $userName = User::findOrFail($userId)->name;
        $isAdmin = User::findOrFail($userId)->isAdmin;
        if($validator){
            $post = new Post();
            $image = $request->file('postImage');
            if($image != null){
                $extension = $image->getClientOriginalExtension();
            }

            //Storage::disk('public')->put($image->getFilename().'.'.$extension, File::get($image));

            if($request->hasFile('postImage')){
                $imageName = uploadImage($request->file('postImage', base_path().'/public/images'.$image));
            }
            $post->post_title = $request->postTitle;
            $post->post_image = $imageName;
            $post->post_content = $request->postContent;
            $post->user_id = $userId;
            $post->user_name = $userName;
            if($isAdmin == 1){
                $post->is_approved = 1;
            }
            $post->save();
        }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $postId)
    {
            $postDetails = Post::with('comments')->find($postId);
            return view('posts.post')->with('post', $postDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $post = Post::findOrFail($postId);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        $validator = Validator::make($request->all(), [
            'postTitle' => 'required|min:3|max:100',
            'postImage' => 'image|mimes:jpeg, png, jpg|max:2048',
            'postContent' => 'required|min:50|max:1000'
        ])->validate();

        $userId = Auth::user()->id;
        $postToEdit = Post::findOrFail($postId);
        if($validator){
            $image = $request->file('postImage');
            if($image != null){
                $extension = $image->getClientOriginalExtension();
            }

            $postToEdit->post_title = $request->postTitle;
            if($request->postImage != null){
                if($request->hasFile('postImage')){
                    $imageName = uploadImage($request->file('postImage', base_path().'/public/images'.$image));
                }
                $postToEdit->post_image = $imageName;
            }
            $postToEdit->post_content = $request->postContent;
            $postToEdit->save();
        }

        return redirect('posts/myPosts/'.$userId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        $userId = Auth::user()->id;
        $postToDelete = Post::findOrFail($postId);
        $postToDelete->delete();
        return redirect('/posts/myPosts/'.$userId);
    }
}
