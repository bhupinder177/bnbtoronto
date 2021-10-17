@extends('template')

@section('main')
<main role="main" id="site-content" >
    <div class="container-fluid container-fluid-90 min-height">

    	@php

    		if($faq == 1){
    	@endphp
			<div class="row">
				<div class="container">
		    		<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Faq's</li>
					  </ol>
					</nav>
				</div>
			</div>
			<div style="clear: both;height: 50px">
				
			</div>

<div class="container">
	  
    	<div class="row">

    		<div class="col-md-3">
					<ul class="">
					   <li><a class="dropdown-item" href="about-bnbtoronto">About BNBToronto</a></li>
					  <li><a class="dropdown-item" href="your-account">Your Account</a></li>
					  <li><a class="dropdown-item" href="creating-an-account">&nbsp;&nbsp;Creating an account</a></li>
					  <li><a class="dropdown-item" href="managing-your-account">&nbsp;&nbsp;Managing your account</a></li>
					  <li><a class="dropdown-item" href="id-and-verification">&nbsp;&nbsp;ID and verification</a></li>
					  <li><a class="dropdown-item" href="account-security">&nbsp;&nbsp;Account security</a></li>
					  <li><a class="dropdown-item" href="reviews">&nbsp;&nbsp;Reviews</a></li>
					  <li><a class="dropdown-item" href="safety#">Safety</a></li>
					  <li><a class="dropdown-item" href="/terms-and-policies">Terms and policies</a></li>
					</ul>
    		</div>
    		<div class="col-md-8">
    			{!! $content !!}
    		</div>
    	</div>

</div>
    	@php
    		}else{
				echo $content;
    		}
    	@endphp
       
    </div>
    <br>
</main>
@stop

<style>
    img {
        width:100%;
        height: auto;
    }
</style>