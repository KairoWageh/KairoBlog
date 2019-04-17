@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="btn btn-primary" style="float: right"><a class="addPost" href="{{ url('/post/add') }}"><i class="fa fa-plus"></i> Post</a></div>
        @if (count($myPosts) === 0)
            <h2>You haven't added posts yet.</h2>
        @else
        @foreach($myPosts as $post)
            <div class="col span_1_of_4 col-xl-12">
                <div class="hdr-txt">
                    <h3 style="display: inline-block">{{ $post->post_title }}</h3>
                    @if($post->is_approved == 0)
                    <h6 style="display: inline-block;color:goldenrod">Not approved yet</h6>
                    @endif
                    <div class="postLinks">
                        <div class="btn btn-primary"><a class="editPost" href="{{ url('/post/edit/'.$post->id) }}"><i class="fa fa-edit"></i>Edit</a></div>
                        <div class="btn btn-danger"><a class="deletePost" href="{{ url('/post/delete/'.$post->id) }}"><i class="fa fa-trash-alt"></i>Delete</a></div>
                    </div>
                </div>
                <div class="post-date">
                    <h6>
                        <!-- April 7, 2019 -->
                        <i class="fa fa-calendar"></i> Posted On <span class="date">{{ $post->created_at }}</span> <i class="fa fa-user"></i> By <span class="postedBy">{{ $post->user_name }}</span>
                    </h6>
                </div>
                <div class="blg-imghvr">
                    <ul>
                        <li>
                            <a href="#" title="post image"><img src="../../images/{{ $post->post_image }}"  alt="post image" /></a>
                        </li>
                    </ul>
                </div>

                <div class="para">
                    <p>{{$post->post_content}}</p>
                </div>
            </div>
        @endforeach
        @endif
    </div>
@endsection