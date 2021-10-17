@extends('template')
@section('main')
<div class="margin-top-85">
	<div class="row m-0">
		<!-- sidebar start-->
		@include('users.sidebar')
		<!--sidebar end-->
		<div class="col-md-10">
			<div class="main-panel min-height mt-4">
				<div class="row justify-content-center">
					<div class="col-md-3 pl-4 pr-4">
						@include('listing.sidebar')
					</div>

					<div class="col-md-9 mt-4 mt-sm-0 pl-4 pr-4"><a href="{{ url('properties/'.$property_id) }}" style="font-size: 18px;float: right" target="_blank">Preview Listing</a>
						<div style="clear: both;height: 1px"></div>
						<form method="post" id="list_des" action="{{url('listing/'.$result->id.'/'.$step)}}"  accept-charset='UTF-8'>
							{{ csrf_field() }}
							<div class="col-md-12 border mt-4 pb-5 rounded-3 pl-sm-0 pr-sm-0 ">
								<div class="form-group col-md-12 main-panelbg pb-3 pt-3 mt-sm-0 ">
									<h4 class="text-18 font-weight-700 pl-3">{{trans('messages.listing_sidebar.description')}}</h4>
								</div>

								<div class="row">
									<div class="col-md-12 pl-5 pr-5">
										<label>{{trans('messages.listing_description.listing_name')}} <span class="text-danger">*</span></label>
										<input type="text" name="name" class="form-control text-16 mt-2" value="{{ $description->properties->name }}" placeholder="" maxlength="100">
										<span class="text-danger">{{ $errors->first('name') }}</span>
									</div>
								</div>
								<div class="row" style="margin-top:10px">
									<div class="col-md-12 pl-5 pr-5">
										<label>Internal Name </label>
										<input type="text" name="internal_name" class="form-control text-16 mt-2" value="{{ $description->internal_name }}" placeholder="" >
										
									</div>
								</div>
								<div class="row" style="margin-top:10px">
									<div class="col-md-12 pl-5 pr-5">
										<label>Youtube Link</label>
										<input type="text" name="youtubelink" class="form-control text-16 mt-2" value="{{ $description->youtubelink }}" placeholder="" >
										
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-12 pl-5 pr-5">
										<label>{{trans('messages.listing_description.summary')}} <span class="text-danger">*</span></label>
										<textarea class="form-control text-16 mt-2" name="summary" rows="6" placeholder="" maxlength="500" ng-model="summary">{{ $description->summary }}</textarea>
										<span class="text-danger">{{ $errors->first('summary') }}</span>
									</div>
								</div>
								
								

								<div class="row mt-4">
									<div class="col-md-12 pl-5 pr-5">
										<label>Neighborhood description</label>
										<textarea class="form-control text-16 mt-2" name="neighborhood_desc" rows="6" placeholder="" maxlength="500" ng-model="summary">{{ $description->	neighborhood_desc }}</textarea>
									
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-12 pl-5 pr-5">
										<label>Wifi Details</label>
										<textarea class="form-control text-16 mt-2" name="wifidetails" rows="6" placeholder="" maxlength="500" ng-model="summary">{{ $description->	wifi_details }}</textarea>
									
									</div>
								</div>

								<!-- <div class="row mt-4">
									<div class="col-md-12 pl-5 pr-5">
										
											<a class="btn btn-primary" style="font-size: 18px" href="{{ url('listing/'.$result->id.'/details') }}" class="secondary-text-color" id="js-write-more">CLICK HERE FOR MORE DETAILS</a> .
										
									</div>
								</div> -->
								
									<div class="row mt-4">
										<div class="col-md-12 pl-5 pr-5">
											<label class="label-large">{{trans('messages.listing_description.about_place')}}</label>
											<textarea class="form-control mt-2" name="about_place" rows="4" placeholder="">{{ $result->property_description->about_place }}</textarea>
										</div>
									</div>
						
									<div class="row mt-4">
										<div class="col-md-12 pl-5 pr-5">
											<label class="label-large">{{trans('messages.listing_description.great_place')}}</label>
											<textarea class="form-control mt-2" name="place_is_great_for" rows="4" placeholder="">{{ $result->property_description->place_is_great_for }}</textarea>
										</div>
									</div>
						
									<div class="row mt-4">
										<div class="col-md-12 pl-5 pr-5">
											<label class="label-large">{{trans('messages.listing_description.guest_access')}}</label>
											<textarea class="form-control mt-2" name="guest_can_access" rows="4" placeholder="">{{ $result->property_description->guest_can_access }}</textarea>
										</div>
									</div>
						
									<div class="row mt-4">
										<div class="col-md-12 pl-5 pr-5">
											<label class="label-large">{{trans('messages.listing_description.guest_interaction')}}</label>
											<textarea class="form-control mt-2" name="interaction_guests" rows="4" placeholder="">{{ $result->property_description->interaction_guests }}</textarea>
										</div>
									</div>
						
									<div class="row mt-4">
										<div class="col-md-12 pl-5 pr-5">
										<label class="label-large">{{trans('messages.listing_description.thing_note')}}</label>
										<textarea class="form-control mt-2" name="other" rows="4" placeholder="">{{ $result->property_description->other }}</textarea>
										</div>
									</div>
						
									<!-- <div class="row mt-4">
										<div class="col-md-12 pl-5 pr-5">
										<label class="label-large">{{trans('messages.listing_description.overview')}}</label>
										<textarea class="form-control mt-2" name="about_neighborhood" rows="4" placeholder="">{{ $result->property_description->about_neighborhood }}</textarea>
										</div>
									</div> -->
						
									<div class="row mt-4">
										<div class="col-md-12 pl-5 pr-5">
										<label class="label-large">{{trans('messages.listing_description.getting_around')}}</label>
										<textarea class="form-control mt-2" name="get_around" rows="4" placeholder="">{{ $result->property_description->get_around }}</textarea>
										</div>
									</div>
							

							</div>

							<div class="col-md-12 p-0 mt-4 mb-5">
								<div class="row m-0 justify-content-between">
									<div class="mt-4">
										<a  href="{{ url('listing/'.$result->id.'/basics') }}" class="btn btn-outline-danger secondary-text-color-hover text-16 font-weight-700  pt-3 pb-3 pl-5 pr-5">
											{{trans('messages.listing_description.back')}}
										</a>
									</div>

									<div class="mt-4">
										<button type="submit" class="btn vbtn-outline-success text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 pl-5 pr-5" id="btn_next"><i class="spinner fa fa-spinner fa-spin d-none" ></i>
											<span id="btn_next-text">{{trans('messages.listing_basic.next')}}</span> 
										</button>
									</div>
								</div>  
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript" src="{{ url('public/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#list_des').validate({
			rules: {
				name: {
					required: true
				},
				summary: {
					required: true,
					maxlength: 500
				}
			},
			submitHandler: function(form)
            {
                
                $("#btn_next").on("click", function (e)
                {	
                	$("#btn_next").attr("disabled", true);
                    e.preventDefault();
                });

                $(".spinner").removeClass('d-none');
                $("#btn_next-text").text("{{trans('messages.listing_basic.next')}} ..");
                return true;
            },
			messages: {
				name: {
					required: "{{ __('messages.jquery_validation.required') }}",
				},
				summary: {
					required:  "{{ __('messages.jquery_validation.required') }}",
					maxlength: "{{ __('messages.jquery_validation.maxlength500') }}",
				} 
			}
		});
	});
</script>
@endpush