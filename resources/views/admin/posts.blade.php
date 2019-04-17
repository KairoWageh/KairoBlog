<!-- font-awesome icons -->
<link href="{{ asset('css/font.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/morris.css') }}" type="text/css" rel="stylesheet" />


<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet"/>

<!-- calendar -->
<link href="{{ asset('css/monthly.css') }}" rel="stylesheet" />
<script src="{{ asset('js/monthly.js') }}"></script>
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{ asset('js/jquery2.0.3.min.js') }}"></script>
<script src="{{ asset('js/raphael-min.js') }}"></script>
<script src="{{ asset('js/morris.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
<link href="{{ asset('css/adminstyle.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @if(count($posts) > 0)
            <table class="table col-sm-12">
                <thead class="thead-dark">
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Added by</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="table-success" style="margin-bottom: 10%; padding:2%; text-align: start">
                        <td width="5%" style="text-align: center">{{ $post->id }}</td>
                        <td >{{ $post->post_title }}</td>
                        <td width="50%">{!! words($post->post_content, 20, ' .....') !!}</td>
                        <td>{{ $post->user_name }}</td>
                        <td >
                            @if($post->is_approved == 0)
                                <a class="btn btn-primary" href="posts/{{ $post->id }}/approve">Approve</a>
                            @else
                                <a class="btn btn-info" style="color: #fff;" href="posts/{{ $post->id }}/hide">Hide</a>
                            @endif
                            <a class="btn btn-danger" href="posts/{{ $post->id }}/delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                @else
                <h2>No posts yet.</h2>
            @endif
        </section>
        <!-- footer -->
        <section>
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2019 Kairo Blog. All rights reserved.</p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->

        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
        <script src="js/jquery.scrollTo.js"></script>
    </section>
@endsection