@extends('template')
@section('main')
<div class="margin-top-85">
	<div class="row m-0">
		{{-- sidebar start--}}
		@include('users.sidebar')
		{{--sidebar end--}}
<style>
	.modal-backdrop.show {
    opacity: .5;
    z-index: 999!important;
}

.unread{
	font-weight: bold!important;
	font-size: 14px;
	color: black;
}

</style>
		<div class="col-lg-10 p-0 mb-5 min-height">
			<div class="main-panel">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 p-0 mb-3">
							<div class="list-bacground mt-4 rounded-3 p-4 border">
								<span class="text-18 pt-4 pb-4 font-weight-700">

<a class="inboxside"><i class="fas fa-sliders-h"></i></a>
									@php

									if(isset($hostinbox)){
											if ($hostinbox==1 ){
												echo "Host ";
											}
									}
									@endphp 

									 {{trans('messages.header.inbox')}}  {{$archives}}
									
								</span>

<div class="modal  fade modal-sm" id="sidelinks" style="float: left;width: 200px;margin-left:150px;margin-top: 220px" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
				
			<div class="modal-body" >
			
				<a class="btn btn-de" href="{{ url('inbox')}}" style="font-size: 15px"><i class="far fa-envelope"></i> All messages <span class="badge badge-info">@isset($msgcount) {{$msgcount}} @endisset</span></a>
				<hr>
				<a class="btn btn-default" href="{{ url('inbox/support')}}"  style="font-size: 15px"><i class="fas fa-envelope"></i> BNB Support <span class="badge badge-info">@isset($countadmin) {{$countadmin}} @endisset</span></a>
				<hr>
				<a class="btn btn-default" href="{{ url('inbox/archive')}}"  style="font-size: 15px"><i class="fas fa-archive"></i>
 Archive <span class="badge badge-info">@isset($countarchive) {{$countarchive}} @endisset</span></a>
				
						
			</div>

			<div class="modal-footer">

				
			</div>
			
		</div>
	</div>
</div>
							</div>
						</div>
					</div>
					@if(isset($booking))
						<div class="row">
							<div class="col-md-9 p-0">
								<div class="container-inbox">
									<sidebar>
										<div class="list-wrap overflow-hidden-x">
											@forelse($messages as $message)
												@php 
													$message->bookings->host_id == Auth::user()->id ? $user ='users':$user ='host';

													if ($hostinbox==1 ){
															
														if($user  == 'host'){
												@endphp

												<div class="list p-2 conversassion" data-id="{{ $message->bookings->id }}">
													<img src="{{ $message->bookings->$user->profile_src }}" alt="user" />
													<div class="info">
														<h3 class="font-weight-700 "  >{{ $message->bookings->$user->first_name }} <span class="text-muted text-12 text-right"> {{$message->created_at->diffForHumans()}}</span></h3> 
														<div class="d-flex justify-content-between">
															<div>
																<p class="text-muted text-14 mb-1 text pr-4 {{$message->read == 0  ? 'unread':''}}"  >{{ substr($message->bookings->properties->name, 0,35)  }} </p>
																@if($message->receiver_id == Auth::id())
																	<p class="text-14 m-0 {{$message->read == 0  ? 'unread':''}}" id="msg-{{ $message->bookings->id }}"><i class="far fa-comment-alt"></i> {{ str_limit($message->message, 20) }} </p>
																@else
																	<p class="text-14 m-0" ><i class="far fa-comment-alt"></i> {{ str_limit($message->message, 20) }} </p>
																@endif

																
															</div>	
														</div>
														@if($message->star)
														<i class="fas fa-star" style="float: right;
    color: gold;
    margin-top: -20px;
    font-size: 17px;
    margin-right: 8px;"></i> @endif
													</div>
												</div>		
												@php






														}
													}else{

														if($user  == 'users'){
												@endphp
												<div class="list p-2 conversassion" data-id="{{ $message->bookings->id }}">
													<img src="{{ $message->bookings->$user->profile_src }}" alt="user" />
													<div class="info">
														<h3 class="font-weight-700 "  >{{ $message->bookings->$user->first_name }}  <span class="text-muted text-12 text-right"> {{$message->created_at->diffForHumans()}}</span> 
															<button class="btn btn-lg msgfilter" data-id="{{$message->id}}" style="float: right;"><i class="fas fa-sliders-h"></i></button></h3> 
														<div class="d-flex justify-content-between">
															<div>
																<p class="text-muted text-14 mb-1 text pr-4 {{$message->read == 0  ? 'unread':''}}"  >{{ substr($message->bookings->properties->name, 0,35)  }} </p>
																@if($message->receiver_id == Auth::id())
																	<p class="text-14 m-0 {{$message->read == 0  ? 'unread':''}}" id="msg-{{ $message->bookings->id }}"  ><i class="far fa-comment-alt"></i> {{ str_limit($message->message, 20) }}  </p>
																@else
																	<p class="text-14 m-0"  ><i class="far fa-comment-alt"></i> {{ str_limit($message->message, 20) }}</p>
																@endif

																
															</div>	
														</div>

@if($message->star)
														<i class="fas fa-star" style="float: right;
    color: gold;
    margin-top: -20px;
    font-size: 17px;
    margin-right: 8px;"></i>@endif
													</div>
												</div>		
												@php
												}
											}
												@endphp		





											@empty
												no conversassion
											@endforelse
										</div>
									</sidebar>

									<div class="content-inbox container-fluid p-0" id="messages">
										<header>
											@php 
												$booking->host_id == Auth::id() ? $users ='users':$users ='host';
												
												@endphp

															
															<a href="{{ url('/') }}/users/show/{{ $booking->$users->id}}">
																<img src="{{ $booking->$users->profile_src}}" alt="img" class="img-40x40" >
															</a>
														
															<div class="info">
																<div class="d-flex justify-content-between">
																	<div>
																		<span class="user">{{ $booking->$users->full_name}}</span>
																	</div>
																</div>
															</div>

															<div class="open">
																<i class="fas fa-inbox"></i>
																<a href="javascript:;">UP</a>
															</div>

														
															




										</header>

										<div class="message-wrap">
											@foreach( $conversassion as $con)
												<div class="{{$con->receiver_id == Auth::id() ? 'message-list' :'message-list me'}} message-list">
													<div class="msg pl-2 pr-2 pb-2 pt-2 mb-2">
														<p class="m-0">{{$con->message}}</p>
													</div>
													<div class="time">{{$con->created_at->diffForHumans()}}</div>
												</div>
											@endforeach
											<div class="message-list me">						 
													<div class="msg_txt mb-0"></div>	
													<div class="time msg_time mt-0"></div>	 
											</div>		
										</div>

										<div class="message-footer">

											<input type="text" class="cht_msg" data-placeholder="Send a message to {0}" />
											<a href="javascript:void(0)" class="btn btn-success chat text-18 send-btn" data-booking="{{$booking->id}}" data-receiver="{{ $booking->$users->id }}" data-property="{{ $booking->property_id }}"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-3 card p-0 " id="booking">
								<div class="w-100 overflow-auto right-inbox p-3">
									<a href="{{ url('/') }}/properties/{{ $booking->property_id}}"><h4 class="text-left text-16 font-weight-700">{{$booking->properties->name}}</h4></a>
									<span class="street-address text-muted text-14">
										<i class="fas fa-map-marker-alt mr-2"></i>{{$booking->properties->property_address->address_line_1}}
									</span>

									<div class="row">
										<div class="col-md-12 border p-2 rounded mt-2">
											<div class="d-flex  justify-content-between">
												<div>
													<div class="text-16"><strong>{{trans('messages.header.check_in')}}</strong></div>
													<div class="text-14">{{$booking->start_date}}</div>
												</div>

												<div>
													<div class="text-16"><strong>{{trans('messages.header.check_out')}}</strong></div>
													<div class="text-14">{{$booking->end_date}}</div>
												</div>

											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12 col-sm-6 col-xs-6 border border-success pl-3 pr-3 text-center pt-3 pb-3 mt-3 rounded-3">
											<p class="text-16 font-weight-700 text-success pt-0 m-0">
												<i class="fas fa-bed text-20 d-none d-sm-inline-block pr-2 text-success"></i><strong>{{$booking->guest}}</strong> <!-- <br> --> {{trans('messages.header.guest')}} </p>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12 p-2">
											<h5 class="text-16 mt-3"><strong>{{trans('messages.payment.payment')}}</strong></h5>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12 p-0">
											<div class="full-table mt-2 border text-dark rounded-3 pt-3 pb-3 mb-4 p-4">
												<p class="row margin-top10 text-justify text-16 mb-0">
													<span class="text-left col-sm-6 text-14">{{$booking->per_night}} x {{$booking->total_night}} {{trans('messages.property_single.night')}} </span>
													<span class="text-right col-sm-6 text-14">${{$booking->per_night * $booking->total_night}}</span>
												</p>

												<p class="row margin-top10 text-justify text-16 mb-0">
													<span class="text-left col-sm-6 text-14">{{trans('messages.property_single.service_fee')}}</span>
													<span class="text-right col-sm-6 text-14">${{$booking->service_charge}}</span>
												</p>

												<p class="row margin-top10 text-justify text-16 mb-0">
													<span class="text-left col-sm-6 text-14">{{trans('messages.property_single.total')}}</span>
													<span class="text-right col-sm-6 text-14">${{$booking->total}}</span>
												</p>

											</div>	
								<center>
<button class="btn btn-warning">Confirmed</button>
</center>
<div class="row">
	<div class="col-md-6"><button class="btn btn-danger">Decline</button></div>
	<div class="col-md-6"><button class="btn btn-primary">Special Offer</button></div>
</div>


<?php if($booking->status  != "Report"){ ?>
<a href="{{ url('/') }}/booking/report/{{ $booking->id}}" class="btn  btn-warning report-warning" style="margin-left:3px;">Report</a>
<?php }else{ echo "<p style='color:red'>This booking has reported.</p>"; }?>
										

										</div>
									</div>
								</div>
							</div>
						</div>
					@else
						<div class="row jutify-content-center w-100 p-4 mt-4">
							<div class="text-center w-100">
								<img src="{{ url('public/img/unnamed.png')}}"   alt="notfound" class="img-fluid">
								<p class="text-center">{{trans('messages.message.empty_inbox')}} </p>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade z-index-medium" id="report-warning-modal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content w-100-p h-100-p">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
			<form method="get" id="myFormId" >
				
			<div class="modal-body">
				
				

				

	

				<div class="row">
					<div class="col-sm-12">
						<h4 class="modal-title" style="font-size: 32px;">What's happening?</h4>
						<p>This will only be shared with BNBtoronto</p>
						<div style="clear: both;height: 20px;"></div>
					</div>
					
<!-- 
					<div class="col-sm-9">I think they're scamming or spamming me </div><div class="col-sm-3"><input type="radio" name="otherreason"  value="I think they're scamming or spamming me"><div style="clear: both;height: 20px;"></div></div>


					<div class="col-sm-9">They're being offensive </div><div class="col-sm-3">
<input type="radio" name="otherreason"  value="They're being offensive"><div style="clear: both;height: 20px;"></div></div>
 -->



@foreach($reasonslist as $reasons)

	<div class="col-sm-9">{{$reasons->title}}</div><div class="col-sm-3">
<input type="radio" name="otherreason"  value="{{$reasons->title}}"><div style="clear: both;height: 20px;"></div></div>

@endforeach


					<div class="col-sm-9">		Something else	
		 </div><div class="col-sm-3"><input type="radio" name="otherreason" id="otherreasonyes"  value="yes">	<div style="clear: both;height: 20px;"></div></div>

		 		<div class="col-sm-12">

				<textarea id="otherreason1" name="otherreason1" class="form-control" required=""  col=150 rows=5 placeholder="Please specify"></textarea>
			</div>
				</div>
								
			</div>

			<div class="modal-footer">
				<!-- <a class="btn btn-danger" id="onhold-modal-yes" href="javascript:void(0)">Yes</a> -->
				<input type="submit" name="submit" class="btn btn-success" id="btnreport" value="OK" style="background: black" >
				<!-- <button type="button" class="btn btn-warning" data-dismiss="modal">No</button> -->
			</div>
			</form>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade z-index-medium" id="save-message-modal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content w-100-p h-100-p">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
				
			<div class="modal-body" id="savemessage">
				<div class="row">
					<div class="col-md-6">Quick Replies</div>
					<div class="col-md-6"><button class="btn-xs btn-danger" onclick="msgmanage(this)" id="{{Auth::id()}}" style="float: right;">Manage</button></div>
					<div class="col-md-12">


		@foreach($savemgss as $smessage)
			<p style="font-size: 14px;margin-bottom: 0!important">{{$smessage->title}}</p>
			<p style="font-size: 12px;margin-bottom: 0!important">{{$smessage->message}}</p>
			<button type="button" class="btn btn-warning" onclick="quickmsg(this)" data-dismiss="modal" id="{{$smessage->message}}">Use this reply</button> 
					<div style="clear: both;height: 10px"></div>
		@endforeach

					


					</div>
				</div>				
			</div>

			<div class="modal-footer">

			</div>
			
		</div>
	</div>
</div>

<div class="modal  fade modal-sm" id="msgfilters" style="float: left;width: 200px;margin-left:380px;margin-top: 280px" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
				
			<div class="modal-body" >
				
				<a class="btn btn-default btn-filter" href="" data-id="" data-status = "1" style="font-size: 13px"><i class="fas fa-comment"></i> Mark as unread </a>
				<hr>
				<a class="btn btn-default btn-filter" href="" data-id=""  data-status = "2"  style="font-size: 13px"><i class="fas fa-star"></i> Star </a>
				<hr>
				<a class="btn btn-default btn-filter" href="" data-id=""  data-status = "3"  style="font-size: 13px"><i class="fas fa-archive"></i> Archive </a>

			</div>

			<div class="modal-footer">

			</div>
			
		</div>
	</div>
</div>



<!-- Modal -->

@stop
@push('scripts')
<script type="text/javascript">

	const ls = localStorage.getItem("selected");
	let selected = false;
	var list = document.querySelectorAll(".list"),
	content = document.querySelector(".content-inbox"),
	input = document.querySelector(".message-footer input"),
	open = document.querySelector(".open a");


	//process
	function process() {
	    if(ls != null) {
	        selected = true;
	        click(list[ls], ls);
	    }
	    if(!selected) {
	        click(list[0], 0);
	    }

	    list.forEach((l,i) => {
	        l.addEventListener("click", function() {
	            click(l, i);
	        });
	    });

	    try {
	        document.querySelector(".list.active").scrollIntoView(false);
	    }
	    catch {}

	}
	process();

	//list click
	function click(l, index) {
	    list.forEach(x => { x.classList.remove("active"); });
	        if(l) {
	            l.classList.add("active");
	            document.querySelector("sidebar").classList.remove("opened");
	            open.innerText="UP";
	        document.querySelector(".message-wrap").scrollTop = document.querySelector(".message-wrap").scrollHeight; 
	        localStorage.setItem("selected", index);
	    }
	}

	open.addEventListener("click", (e) => {
	    const sidebar = document.querySelector("sidebar");
	    sidebar.classList.toggle("opened");
	    if(sidebar.classList.value == 'opened')
	        e.target.innerText = "DOWN";
	    else
	        e.target.innerText = "UP";
	});
	$('#messages').empty().html('<p>&nbsp;&nbsp;&nbsp;Please click message on the sidebar</p>');
	$('#booking').empty().html('');	
	$(document).on('click', '.conversassion', function(){
	    var id = $(this).data('id');
	    var dataURL = APP_URL+'/messaging/booking';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'id':id,
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
	        	
	            $('#msg-'+id).removeClass('text-success');
	            $('#messages').empty().html(data['inbox']);
	            $('#booking').empty().html(data['booking']);	
	        }
	    })
	});

	$(document).on('click', '.chat', function(){
	    var msg = $('.cht_msg').val();
	    var booking_id = $(this).data('booking');
	    var receiver_id = $(this).data('receiver');
	    var property_id = $(this).data('property');
	    var result = '<div class="msg pl-2 pr-2 pb-2 pt-2 mb-2">'
						+'<p class="m-0">'+msg+'</p>'
					+'</div>'
					+'<div class="time">just now</div>'

	    var dataURL = APP_URL+'/messaging/reply';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'msg':msg,
	            'booking_id':booking_id,
	            'receiver_id':receiver_id,
	            'property_id':property_id,
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
	            $('.msg_txt').append(result);
	            $('.cht_msg').val("");
	        }
	    })   
	});

	$(".cht_msg").on('keyup', function(event) {
	    if (event.which===13) {
	        $('.chat').trigger("click");
	    }
	});

</script>
   <script type="text/javascript">
$("#otherreason1").hide();

$('input:radio[name="otherreason"]').change(function(){
 
        if ($(this).val() == 'yes') {
           $("#otherreason1").show();

        }
        else {
           $("#otherreason1").hide();
           $("#otherreason1").val("");
           $("#otherreason1").removeAttr("required");
        }
    });

  

    	$(document).on('change', '#statustype', function(e){
	var stat = $(this).val();
	if(stat=="Onhold"){
		$("#whyonhold").show();
		$("#whyonhold1").show();
	}else{
		$("#whyonhold").hide();
		$("#whyonhold1").hide();
	}
	
});
     
$(document).on('click', '.report-warning', function(e){
	e.preventDefault();
	var url = $(this).attr('href');
	//$('#onhold-modal-yes').attr('href', url)
	$('#myFormId').attr('action',url);
	$('#report-warning-modal').modal('show');
});


$(document).on('click', '.btn-save-message', function(e){
	e.preventDefault();
	var url = $(this).attr('href');
	//$('#onhold-modal-yes').attr('href', url)
	$('#savemessage').empty().html("");	
	savemsglist();
	$('#myFormId').attr('action',url);
	$('#save-message-modal').modal('show');
});


$(document).on('click', '.btn-back-message', function(e){
	e.preventDefault();
	var url = $(this).attr('href');
	//$('#onhold-modal-yes').attr('href', url)
	$('#savemessage').empty().html("");	
	savemsglist();
	$('#myFormId').attr('action',url);
	$('#save-message-modal').modal('show');
});

$(document).on('click', '.inboxside', function(e){

	$('#sidelinks').modal('show');
});


$(document).on('click', '.msgfilter', function(e){
	$(".btn-filter").attr("data-id",$(this).data("id"));
	$('#msgfilters').modal('show');
});



$(document).on('click', '.btn-filter', function(e){
		//e.preventDefault();
		var id = $(this).data("id");
		var status= $(this).data("status");
		var dataURL = APP_URL+'/messaging/savefilter';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'id':id,
	            'status':status,
	           
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
				//alert(data);
				$('#msgfilters').modal('close');
	        }
	    })
});



$(document).on('click', '.btn-savefilter', function(e){
	e.preventDefault();

	var id = $("#msgid").val();
	var message = $("#msgsave").val();
	var title = $("#titleMsg").val();
	
	 var dataURL = APP_URL+'/messaging/savefilter';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'id':id,
	            'title':title,
	            'message':message,
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
				$('#msgfilters').modal('show');
	        }
	    })
});




$(document).on('click', '.btn-savemessage', function(e){
	e.preventDefault();

	var id = $("#msgid").val();
	var message = $("#msgsave").val();
	var title = $("#titleMsg").val();
	
	 var dataURL = APP_URL+'/messaging/saveformmsg';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'id':id,
	            'title':title,
	            'message':message,
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
	            var url = $(this).attr('href');
				//$('#onhold-modal-yes').attr('href', url)
				$('#savemessage').empty().html("");	
				savemsglist();
				$('#myFormId').attr('action',url);
				$('#save-message-modal').modal('show');
	        }
	    })
});


//cht_msg

function quickmsg(elem) {

	$(".cht_msg").val(elem.id);

}


function savemsglist(){


		var id =1;

	    var dataURL = APP_URL+'/messaging/getsavemsg';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'id':id,
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
	            $('#savemessage').empty().html(data['savemsglist']);	
	        }
	    })



}



function editsavemsg(msgid){



	    var dataURL = APP_URL+'/messaging/editsavemsg';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'id':msgid.id,
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
	            $('#savemessage').empty().html(data['msgdetails']);	
	        }
	    })



}



function msgmanage(elem){
	//alert(elem.id);
	 var id = $(this).data(elem.id);
	    var dataURL = APP_URL+'/messaging/savemessage';
	    $.ajax({
	        url: dataURL,
	        data:{
	            "_token": "{{ csrf_token() }}",
	            'id':id,
	        },
	        type: 'post',
	        dataType: 'json',
	        success: function(data) {
	        	
	            // $('#msg-'+id).removeClass('text-success');
	            // $('#messages').empty().html(data['inbox']);
	            $('#savemessage').empty().html(data['smgs']);	
	        }
	    })
	// $("#savemessage").html("<input type="");
}

    </script>
@endpush
