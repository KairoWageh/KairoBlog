@extends('layouts.app')

@section('content')
<div class="container">
    <div class="btn btn-primary" style="float: right"><a class="addPost" href="{{ url('/post/add') }}"><i class="fa fa-plus"></i> Post</a></div>
    @if(count($posts) === 0)
        <h2>No posts to show.</h2>
    @else
    <h3 style="display: inline-block">Latest News:</h3>

        @foreach($posts as $post)
        <div class="col span_1_of_4 col-xl-12">
            <div class="hdr-txt">
                <h3>{{ $post->post_title }}</h3>
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
                        <a href="#" title="post image"><img src="images/{{ $post->post_image }}"  alt="post image" /></a>
                    </li>
                </ul>
            </div>

            <div class="para">
                <p>{!! words($post->post_content, 20, ' .....') !!}</p>
            </div>
            <div class="btn">
                <a class="readMore" href="/post/{{ $post->id }}">More</a>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection
