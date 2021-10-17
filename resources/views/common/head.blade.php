<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Metas For sharing property in social media -->
		<meta property="og:url"                content="{{ isset($shareLink) ? $shareLink : url('/') }}" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="{{ isset($title) ? $title : '' }}" />
		<meta property="og:description"        content="{{ isset($result->property_description->summary) ? $result->property_description->summary : ''  }}" />	
		<meta property="og:image"              content="{{ (isset($property_id) && !empty($property_id && isset($property_photos[0]->photo) )) ? url('public/images/property/'.$property_id.'/'.$property_photos[0]->photo) : BANNER_URL  }}" />


		
		@if (!empty($favicon))
			<link rel="shortcut icon" href="{{ $favicon }}">
		@endif

		<title>{{ $title ?? Helpers::meta((!isset($exception)) ? Route::current()->uri() : '', 'title') }} {{ $additional_title ?? '' }}</title>
		<meta property="og:image" content="">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- CSS  new version start-->
		@stack('css')
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('public/css/vendors/bootstrap/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/css/vendors/fontawesome/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/css/style.min.css')}}"> 
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<!--CSS new version end-->

		<!-- <style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
      border-bottom: 1px solid #172435;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel2 {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style> --><!-- 
						@isset(Auth::user()->user_type)
                                @if(Auth::user()->user_type == 'guest')
                                 <style type="text/css">
                                	body{
                                		background: black;
                                	}
                                </style>
                                @else
                                <style type="text/css">
                                	body{
                                		background: red;
                                	}
                                </style>
                         		@endif
                        @endisset -->
                       @isset(Auth::user()->user_type)
                      
                       @php

                       		$pagename = Route::current()->uri() ;

                       		if($pagename=="dashboard" || $pagename=="trips/active" || $pagename=="inbox" || $pagename=="users/transaction-history" || $pagename=="users/profile" || $pagename=="users/reviews"|| $pagename=="users/reviews_by_you" || $pagename=="my-bookings" || $pagename=="properties" || $pagename=="users/payout-list" || $pagename=="property/create"){
@endphp

                        <style type="text/css">
                        	body { 
  background: url( @php echo 'shttps://bnbtoronto.ca/public/front/images/logos/'.Session::get('hostbackground'); @endphp ) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body{padding-left: 15px!important;padding-right: 15px!important}

body {
    font-family: 'Poppins'!important;
    font-size: 22px;
}

.header_area {
    position: absolute;
    top: 0;
    left: 15px;
    width: 98.4%;
    margin: 0 auto!important;
    transition: background .4s,all .3s linear;
    background: #172435;
    z-index: 1000;
    box-shadow: 0 5px 20px rgb(0 0 0 / 11%);
}


                        </style>
                         @php
                  
                }
                     @endphp
                        @endisset
	</head>
	<body style="padding-left: 15px!important;padding-right: 15px!important">


	
