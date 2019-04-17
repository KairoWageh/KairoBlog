@extends('layouts.app')
@section('content')
    <div class="container">
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
                        <a href="#" title="post image"><img src="../images/{{ $post->post_image }}"  alt="post image" /></a>
                    </li>
                </ul>
            </div>

            <div class="para">
                <p>{{$post->post_content}}</p>
            </div>
        </div>

        @if(count($post->comments) > 0)
            <h3>Comments:</h3>
            @foreach($post->comments as $comment)
            <div class="col span_1_of_4 col-xl-12">
                <div class="hdr-txt">
                    <h3 style="display: inline-block">{{ $comment->user_name }}</h3>
                    <h6 style="display: inline-block;">
                        <i class="fa fa-calendar"></i> Commented On <span class="date">{{ $comment->created_at }}</span>
                    </h6>

                    @if($comment->user_id == Auth::user()->id)
                        <span class="commentLinks" style="float: right;">
                            <p onclick="editText()" id="editLink " style="margin-right: 3px">Edit</p>
                            <a href="/post/comment/delete/{{ $comment->id }}" style="margin-left: 3px">Delete</a>
                        </span>

                    @endif
                </div>

                <div class="para" id="para">
                    <p>{{$comment->comment_body}}</p>
                </div>
            </div>
            @endforeach
            @else
            <h2>There are no comments yet.</h2>
        @endif

        <h3>Add Comment: </h3>
        <div id="comment_{{ $post->id }}"></div>
        {!! Form::open(["method" => "POST", "url" => "post/comment/".$post->id, "id" => "commentForm_{{$post->id}}"]) !!}
        @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <div class="form-group">
            {!! Form::textarea('commentBody',null , ['class' => 'form-control', 'rows' => 4, 'id' => 'commentBody']) !!}
        </div>
        <div class="form-group">
            <div style="width: 30%; margin: 0 auto">
                {!! Form::submit("Comment", ['class' => 'btn btn-danger submitComment']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function editText(){
            //document.getElementById("para").innerHTML = ("<textarea class ='form-control' rows='3'></textarea>")
            $(this).html("<textarea class ='form-control' rows='3'></textarea>");
        }
        // $("#editLink ").on("click", function () {
        //     // $(".para").innerHTML("<textarea rows='4'></textarea>");
        //     alert("hi");
        // })
        jQuery(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.submitComment', function () {
                var id = $(this).val();
                var commentBody = $('#commentBody'+id).serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "/post/comment/{{$post->id}}",
                    data: commentBody,
                    success: function () {
                        getComment($id);
                        jQuery('#commentForm_'+id)[0].reset();
                    }
                });

            });
        });
        function getComment(id){
            $.ajax({
                url: '/post/{id}',
                data: {id:id},
                success: function(data){
                    $('#comment_'+id).html(data);
                }
            });
        }
    </script>
@endsection