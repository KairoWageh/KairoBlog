<script src="{{ asset('js/jquery2.0.3.min.js') }}"></script>

<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
{{--<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ asset('js/flot-chart/excanvas.min.js') }}"></script><![endif]-->--}}
<script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
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
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Users</h4>
						<h3>{{ count($usersNumber) }}</h3>
						<p>in site</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-sticky-note"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Posts</h4>
						<h3>{{ count($postsNumber) }}</h3>
						<p>in site</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-comments" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Comments</h4>
						<h3>{{ count($commentsNumber) }}</h3>
						<p>in site</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<!-- //market-->
		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">

							<div class="w3l-calendar-left">
								<div class="calendar-heading">

								</div>
								<div class="monthly" id="mycalendar">
                                </div>
							</div>

							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		<!-- //calendar -->
			<div class="clearfix">
			</div>
		</div>
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

<!-- morris JavaScript -->	
{{--<script>--}}
{{--	$(document).ready(function() {--}}
{{--		//BOX BUTTON SHOW AND CLOSE--}}
{{--	   jQuery('.small-graph-box').hover(function() {--}}
{{--		  jQuery(this).find('.box-button').fadeIn('fast');--}}
{{--	   }, function() {--}}
{{--		  jQuery(this).find('.box-button').fadeOut('fast');--}}
{{--	   });--}}
{{--	   jQuery('.small-graph-box .box-close').click(function() {--}}
{{--		  jQuery(this).closest('.small-graph-box').fadeOut(200);--}}
{{--		  return false;--}}
{{--	   });--}}

{{--	    //CHARTS--}}
{{--	    function gd(year, day, month) {--}}
{{--			return new Date(year, month - 1, day).getTime();--}}
{{--		}--}}
{{--		//--}}
{{--		// graphArea2 = Morris.Area({--}}
{{--		// 	element: 'hero-area',--}}
{{--		// 	padding: 10,--}}
{{--        // behaveLikeLine: true,--}}
{{--        // gridEnabled: false,--}}
{{--        // gridLineColor: '#dddddd',--}}
{{--        // axes: true,--}}
{{--        // resize: true,--}}
{{--        // smooth:true,--}}
{{--        // pointSize: 0,--}}
{{--        // lineWidth: 0,--}}
{{--        // fillOpacity:0.85,--}}
{{--		// 	data: [--}}
{{--		// 		{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},--}}
{{--		// 		{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},--}}
{{--		// 		{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},--}}
{{--		// 		{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},--}}
{{--		// 		{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},--}}
{{--		// 		{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},--}}
{{--		// 		{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},--}}
{{--		// 		{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},--}}
{{--		// 		{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},--}}
{{--		//--}}
{{--		// 	],--}}
{{--		// 	lineColors:['#eb6f6f','#926383','#eb6f6f'],--}}
{{--		// 	xkey: 'period',--}}
{{--        //     redraw: true,--}}
{{--        //     ykeys: ['iphone', 'ipad', 'itouch'],--}}
{{--        //     labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],--}}
{{--		// 	pointSize: 2,--}}
{{--		// 	hideHover: 'auto',--}}
{{--		// 	resize: true--}}
{{--		// });--}}
{{--	});--}}
{{--	</script>--}}
<!-- calendar -->
{{--	<script type="text/javascript" src="js/monthly.js"></script>--}}
	<script type="text/javascript">
		$(window).load( function() {

			// $('#mycalendar').monthly({
			// 	mode: 'event',
            //
			// });
            //
			// $('#mycalendar').monthly({
			// 	mode: 'picker',
			// 	target: '#mytarget',
			// 	setWidth: '250px',
			// 	startHidden: true,
			// 	showTrigger: '#mytarget',
			// 	stylePast: true,
			// 	disablePast: true
			// });
		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</section>
@endsection
