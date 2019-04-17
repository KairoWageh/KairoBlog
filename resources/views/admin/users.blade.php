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
            @if(count($users) > 0)
            <table class="table col-sm-12">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="table-success" style="margin-bottom: 1px">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a class="btn btn-danger" href="users/{{ $user->id }}/delete">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h2>No users yet.</h2>
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

