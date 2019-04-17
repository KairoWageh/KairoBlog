@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit post</h3>
        <div class=""row>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['method' => 'POST', 'url' => 'post/edit/'.$post->id, 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <div class="col-sm-4" style="float: left">
                    {!! Form::label('postTitle', 'Title') !!}
                    {!! Form::text('postTitle', $post->post_title, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-2" style="float: left">
                    {!! Form::label('postImage', 'Image') !!}
                    {!! Form::file('postImage', ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-3" style="float: left;">
                    <img src="../../images/{{ $post->post_image }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12" style="float: left;">
                    {!! Form::label('postContent', 'Content') !!}
                    {!! Form::textarea('postContent', $post->post_content, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div style="width: 30%; margin: 0 auto">
                    {!! Form::submit("Edit", ['class' => 'btn btn-danger']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection