@extends('template')

@section('main')
<style>
	.modal-backdrop.show {
    opacity: .5;
    z-index: 999!important;
}
</style>
<div class="margin-top-85">
	<div class="row m-0">
		@include('users.sidebar')
		<div class="col-lg-10">
			<div class="main-panel">
				<div class="container-fluid min-height">
					<div class="row">
						<div class="col-md-12 p-0 mb-3">

							<div class="list-bacground mt-4 rounded-3 p-4 border">
							<span class="text-18 pt-4 pb-4 font-weight-700">
								{{trans('messages.users_dashboard.my_trips')}}&nbsp;&nbsp;&nbsp;&nbsp;<a href="/inbox?host=1" class="btn btn-lg btn-primary" >Messages</a>
							</span>

							<div class="float-right">
								<div class="d-flex">
									<div class="pr-4">
										<span class="text-14 pt-2 pb-2 font-weight-700">{{trans('messages.users_dashboard.sort_by')}}</span>

									</div>

									<div>
										<form action="{{url('/trips/active')}}" method="POST" id="my-trip-form">
											{{ csrf_field() }}
											<select class="form-control room-list-status text-14 minus-mt-6" name="status" id="trip_select">
												<option value="All" {{ $status == "All" ? ' selected="selected"' : '' }}>All</option>
												<option value="Current" {{ $status == "Current" ? ' selected="selected"' : '' }}>Current</option>
												<option value="Upcoming" {{ $status == "Upcoming" ? ' selected="selected"' : '' }}>Upcoming</option>
												<option value="Pending" {{ $status == "Pending" ? ' selected="selected"' : '' }}>Pending</option>
												<option value="Completed" {{ $status == "Completed" ? ' selected="selected"' : '' }}>Completed</option>
												<option value="Expired" {{ $status == "Expired" ? ' selected="selected"' : '' }}>Expired</option>
											</select>
										</form>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					@if(Session::has('message'))
					<div class="alert alert-success text-center" role="alert" id="alert">
                        <span id="messages">{{ Session::get('message') }}</span>
                    </div>
                    @endif



<table class="table table-striped" style="font-size: 13px;">
    <tr>
        <th><strong>Status</strong></th>
        <th><strong>Host</strong></th>
        <th><strong>Check-in</strong></th>
        <th><strong>Checkout</strong></th>
        <th><strong>Booked</strong></th>
        <th><strong>Listing</strong></th>
        <th><strong>Total payout</strong></th>
        <th><strong>Location</strong></th>
        <th><strong></strong></th>
    </tr>


@forelse($bookings as $booking)
	<?php 
	if($booking->status  != "Report"){



                            if ($booking->created_at < $yesterday && $booking->status != 'Accepted') {

                                $booking->status = 'Expired';
                            } 


	}

                        ?>



    <tr>
        <td> {{ $booking->status}} </td>
        <td> {{ $booking->host->first_name}} </td>
        <td> {{ date(' M d, Y', strtotime($booking->start_date)) }} </td>
        <td> {{ date(' M d, Y', strtotime($booking->end_date)) }} </td>
        <td> {{$booking->created_at}} </td>
        <td> <a href="{{ url('/') }}/properties/{{ $booking->property_id}}"  target="_blank">{{ $booking->properties->name}} </a> </td>
         <td> {{trans('messages.trips_active.view_receipt')}} Make {{trans('messages.payment.payment')}} </td>
          <td> {{ $booking->properties->property_address->address_line_1 }} </td>
           <td> <a href="{{ url('/') }}/properties/{{ $booking->property_id}}" class="btn btn-xs btn-primary" style="background: #2b2b2b;" target="_blank">Preview</a>
<!-- 
										 <a href="{{ url('/') }}/booking/report/{{ $booking->property_id}}" class="btn btn-danger"  target="_blank">
											<p class="mb-0 text-18 text-color font-weight-700 text-color-hover pr-2" style="font-size: 12px;color: white">Report</p>     
										</a> -->
<?php if($booking->status  != "Report"){ ?>
<a href="{{ url('/') }}/booking/report/{{ $booking->id}}" class="btn btn-xs btn-warning report-warning" style="margin-left:3px;"><!-- <i class="glyphicon glyphicon-exclamation-sign"></i> -->Report</a>
<?php }?>
										 </td>
    </tr>


	@empty
						<div class="row jutify-content-center position-center w-100 p-4 mt-4 ">
							<div class="text-center w-100">
								<img src="{{ url('public/img/unnamed.png')}}"   alt="notfound" class="img-fluid">
								<p class="text-center"> {{trans('messages.message.empty_tripts')}} </p>
							</div>
						</div>
					@endforelse 
   
</table>
<div class="row justify-content-between overflow-auto pb-3 mt-4 mb-5">
						{{ $bookings->appends(request()->except('page'))->links('paginate')}}
</div>



					<!-- @forelse($bookings as $booking)
						<?php 
                            // if ($booking->created_at < $yesterday && $booking->status != 'Accepted') {

                            //     $booking->status = 'Expired';
                            // } 
                        ?>

						<div class="row border border p-2  rounded-3 mt-4">
							<div class="col-md-3 col-xl-4 p-2">
                                <div class="img-event">
                                    <a href="{{ url('/') }}/properties/{{ $booking->property_id}}">
                                        <img class="img-fluid rounded" src="{{ $booking->properties->cover_photo }}" alt="cover_photo">
                                    </a>  
                                </div>
							</div>
							
							<div class="col-md-9 col-xl-8 pl-2">
								<div class="row m-0 pr-4">
									<div class="col-10 col-sm-9 p-0">
										<a href="{{ url('/') }}/properties/{{ $booking->property_id}}">
											<p class="mb-0 text-18 text-color font-weight-700 text-color-hover pr-2">{{ $booking->properties->name}} </p>     
										</a>
									</div>

									<div class="col-2 col-sm-3">
										<span class="badge vbadge-success text-13 mt-3 p-2 {{ $booking->status}}">{{ $booking->status}}</span>
									</div>
								</div>

								<div class="d-flex justify-content-between ">
									<div>
										<p class="text-14 text-muted mb-0">
											<i class="fas fa-map-marker-alt"></i>
											{{ $booking->properties->property_address->address_line_1 }}
										</p>
										<p class="text-14 mt-3"> 
											<i class="fas fa-calendar"></i> {{ date(' M d, Y', strtotime($booking->start_date)) }}  -  {{ date(' M d, Y', strtotime($booking->end_date)) }}
										</p>
		
										<p class="text-14 mt-3">
											<span class="{{$booking->status == 'Accepted' ? '' : 'd-none' }}">
												<a href="{{ url('/') }}/booking/receipt?code={{ $booking->code }}">
													<i class="fas fa-receipt"></i> {{trans('messages.trips_active.view_receipt')}}
												</a>
												
											</span>

											<span class="{{$booking->status == 'Processing' ? '' : 'd-none' }}">
												<a href="{{ url('/') }}/booking_payment/{{ $booking->id }}">
													<i class="fab fa-cc-amazon-pay"></i>  Make {{trans('messages.payment.payment')}}
												</a>
												
											</span>

										</p>
									</div>

									<div class="pr-2 mt-5 mt-sm-0">
										<div class="align-self-center  mt-sm-0 w-100">
											<div class="row justify-content-center">
												<div class='img-round '>
													<a href="{{ url('/') }}/users/show/{{ $booking->host_id}}">
														<img src="{{ $booking->host->profile_src }}" alt="{{ $booking->host->first_name }}" class="rounded-circle img-70x70">
													</a>
												</div>
											</div>

											<p class="text-center font-weight-700 mb-0">
												<a href="{{ url('/') }}/users/show/{{ $booking->host_id}}" class="text-color text-color-hover">
													{{ $booking->host->first_name}}
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					@empty
						<div class="row jutify-content-center position-center w-100 p-4 mt-4 ">
							<div class="text-center w-100">
								<img src="{{ url('public/img/unnamed.png')}}"   alt="notfound" class="img-fluid">
								<p class="text-center"> {{trans('messages.message.empty_tripts')}} </p>
							</div>
						</div>
					@endforelse 

					<div class="row justify-content-between overflow-auto pb-3 mt-4 mb-5">
						{{ $bookings->appends(request()->except('page'))->links('paginate')}}
					</div> -->
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
@stop
@push('scripts')
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
        $(document).on('change', '#trip_select', function(){

            $("#my-trip-form").trigger("submit"); 
              
        });

        $(document).on('click', '.report-warning', function(e){
	e.preventDefault();
	var url = $(this).attr('href');
	//$('#onhold-modal-yes').attr('href', url)
	$('#myFormId').attr('action',url);
	$('#report-warning-modal').modal('show');
});


 $(document).on('click', '#btnreport', function(e){
	
});
    </script>
@endpush