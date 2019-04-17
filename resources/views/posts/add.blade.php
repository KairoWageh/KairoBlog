@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Add post</h3>
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
            {!! Form::open(['method' => 'POST', 'url' => 'post/add', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <div class="col-sm-6" style="float: left">
                    {!! Form::label('postTitle', 'Title') !!}
                    {!! Form::text('postTitle', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-3" style="float: left">
                    {!! Form::label('postImage', 'Image') !!}
                    {!! Form::file('postImage', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12" style="float: left;">
                    {!! Form::label('postContent', 'Content') !!}
                    {!! Form::textarea('postContent', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div style="width: 30%; margin: 0 auto">
                    {!! Form::submit("Add", ['class' => 'btn btn-danger']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection