@extends('template')
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ url('public/css/daterangepicker.min.css')}}" />
@endpush 
<style type="text/css">
	.testimonialbg {
    margin: -.5rem 0;
    background: white!important;
    background-size: cover;
}
.recommandedbg {
    background: white!important;
}
.footer-bg {
    background: #F8F8F8!important;
    color: white;
}
p,h1,h2,h3,h4,h5{ font-family: 'Poppins'!important;}
button.vbtn-default {
    background: #F2A154!important;
    color: #fff;
    font-weight: 700;
}

.hero-banner h1 {
    color: #2b2b2b;
    margin-bottom: 10px!important;
    font-size: 25px;
    font-weight: 700;
    padding: 0 15px;
}
</style>
@section('main')
	<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type')}}">
	<section class="hero-banner magic-ball  " style="margin-top: 20px;">
		<div class="main-banner"  style="background-image: url('{{BANNER_URL}}'); border-radius: 15px;">
			<div class="container">
				<div class="row align-items-center text-center text-md-left">
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
						<div class="main_formbg item animated zoomIn mt-80" style="height: 135px; margin-top: 607px!important; border-radius: 15px; margin-bottom: -69px;">
							<h1 class="pt-4 ">Where do you want to go?</h1>
							<form id="front-search-form" method="post" action="{{url('search')}}">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-4">
										<div class="input-group ">
											<input class="form-control p-3 text-14" id="front-search-field" placeholder="{{trans('messages.home.where_want_to_go')}}" autocomplete="off" name="location" type="text" required>
										</div>
									</div>

									<div class="col-md-5 ">
										<div class="d-flex" id="daterange-btn">
											<div class="input-group " style="margin-right: 10px">
												<input class="form-control p-3 border-right-0 border text-14 checkinout" name="checkin" id="startDate" type="text" placeholder="{{trans('messages.search.check_in')}}" autocomplete="off" readonly="readonly" required>
												<span class="input-group-append">
													<div class="input-group-text">
														<i class="fa fa-calendar success-text text-14"></i>
													</div>
												</span>
											</div>

											<div class="input-group ">
												<input class="form-control p-3 border-right-0 border text-14 checkinout" name="checkout" id="endDate" placeholder="{{trans('messages.search.check_out')}}" type="text" readonly="readonly" required>
												<span class="input-group-append">
													<div class="input-group-text">
													<i class="fa fa-calendar success-text text-14"></i>
													</div>
												</span>
											</div>
										</div>
									</div>

									<div class="col-md-2 ">
										<div class="input-group">
											<select id="front-search-guests" class="form-control  text-14">
											<option class="p-4 text-14" value="1">1 {{trans('messages.home.guest')}}</option>
											@for($i=2;$i<=16;$i++)
												<option  class="p-4 text-14" value="{{ $i }}"> {{ ($i == '16') ? $i.'+ '.trans('messages.home.guest') : $i.' '.trans('messages.property_single.guest') }} </option>
											@endfor
											</select>
										</div>
									</div>

									<div class="col-md-1 front-search ">
										<button type="submit" class="btn vbtn-default btn-block p-3 text-16"><i class="fas fa-search"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@if(!$starting_cities->isEmpty())
	<section class="bg-gray mt-70 pb-2">
		<div class="container-fluid container-fluid-90">
			<div class="row">
				<div class="section-intro text-center">
					<p class="item animated fadeIn text-24 font-weight-700 m-0 text-capitalize">{{trans('messages.home.top_destination')}}</p>
					<p class="mt-3">{{trans('messages.home.destination_slogan')}} </p>
				</div>
			</div>

			<div class="row mt-2">
				@foreach($starting_cities as $city)
				<div class="col-md-4 mt-5">
				<a href="{{URL::to('/')}}/search?location={{ $city->name }}&checkin=&checkout=&guest=1" target="_new">
						<div class="grid item animated zoomIn">
							<figure class="effect-ming">
								<img src="{{ $city->image_url }}" alt="city"/>
									<figcaption>
										<p class="text-18 font-weight-700 position-center">{{$city->name}}</p>
									</figcaption>     
							</figure>
						</div>
					</a>
				</div>   
				@endforeach
			</div>
		</div>
	</section>
	@endif

	@if(!$properties->isEmpty())
		<section class="recommandedbg bg-gray mt-4 magic-ball magic-ball-about pb-5">
			<div class="container-fluid container-fluid-90">
				<div class="row">
					<div class="recommandedhead section-intro text-center mt-70">
						<p class="item animated fadeIn text-24 font-weight-700 m-0">FEATURED PROPERTIES</p>
						<!-- <p class="mt-2">{{trans('messages.home.recommended_slogan')}}</p> -->
					</div>
				</div>

				<div class="row mt-5">
					@foreach($properties as $property)
					<div class="col-md-6 col-lg-4 col-xl-3 pl-3 pr-3 pb-3 mt-4">
						<div class="card h-100 card-shadow card-1">
							<div class="grid">
								<a href="properties/{{ $property->id }}" aria-label="{{ $property->name}}"  target="_new">
									<figure class="effect-milo">
										<img src="{{ $property->cover_photo }}" class="img-fluid" alt="{{ $property->name}}"/>
										<figcaption>
										</figcaption>     
									</figure>        
								</a>
							</div>

							<div class="card-body p-0 pl-1 pr-1">
								<div class="d-flex">
									<div>
										<div class="profile-img pl-2">
											<a href="{{ url('users/show/'.$property->host_id) }}"  target="_new"><img src="{{ $property->users->profile_src }}" alt="{{ $property->name}}" class="img-fluid"></a>
										</div>
									</div>

									<div class="p-2 text">
										<a class="text-color text-color-hover" href="properties/{{ $property->id }}"  target="_new">
											<p class="text-16 font-weight-700 text"> {{ $property->name}}</p>
										</a>
										<p class="text-13 mt-2 mb-0 text"><i class="fas fa-map-marker-alt"></i> {{$property->property_address->city}}</p>
									</div>
								</div>

								<div class="review-0 p-3">
									<div class="d-flex justify-content-between">
										
										<div>
											<span><i class="fa fa-star text-14 secondary-text-color"></i> 
												@if( $property->guest_review)
													{{ $property->avg_rating }}
												@else
													0
												@endif
												({{ $property->guest_review }})</span>
										</div>


										<div>
											<span class="font-weight-700">{!! moneyFormat( $property->property_price->currency->symbol, $property->property_price->price) !!}</span> / {{trans('messages.property_single.night')}}
										</div>
									</div>
								</div>

								<div class="card-footer text-muted p-0 border-0">
									<div class="d-flex bg-white justify-content-between pl-2 pr-2 pt-2 mb-3">
										<div>
											<ul class="list-inline">
												<li class="list-inline-item  pl-4 pr-4 border rounded-3 mt-2 bg-light text-dark">
														<div class="vtooltip"> <i class="fas fa-user-friends"></i> {{ $property->accommodates }}
														<span class="vtooltiptext text-14">{{ $property->accommodates }} {{trans('messages.property_single.guest')}}</span>
													</div>
												</li>

												<li class="list-inline-item pl-4 pr-4 border rounded-3 mt-2 bg-light">
													<div class="vtooltip"> <i class="fas fa-bed"></i> {{ $property->bedrooms }}
														<span class="vtooltiptext  text-14">{{ $property->bedrooms }} {{trans('messages.property_single.bedroom')}}</span>
													</div>
												</li>

												<li class="list-inline-item pl-4 pr-4 border rounded-3 mt-2 bg-light">
													<div class="vtooltip"> <i class="fas fa-bath"></i> {{ $property->bathrooms }}
														<span class="vtooltiptext  text-14 p-2">{{ $property->bathrooms }} {{trans('messages.property_single.bathroom')}}</span>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach    
				</div>
			</div>
		</section>
	@endif



</section>
<div class="container-fluid container-fluid-90">
			
<center><img src="http://bnbtoronto.ca/images/become-a-host.png" style="width:100%"></center>
</div>
	@if(!$testimonials->isEmpty())
	<section class="testimonialbg pb-70">
		<div class="testimonials">
			<div class="container">
				<div class="row">
					<div class="recommandedhead section-intro text-center mt-70">

						<p class="animated fadeIn text-24 text-color font-weight-700 m-0">{{ trans('messages.home.say_about_us') }}</p>
						<p class="mt-2">{{trans('messages.home.people_say')}}</p>
					</div>
				</div>

				<div class="row mt-5">
					@foreach($testimonials as $testimonial)
					<?php $i = 0; ?>
						<div class="col-md-4 mt-4">
							<div class="item h-100 card-1">
								<img src="{{$testimonial->image_url}}" alt="{{$testimonial->name}}">
								<div class="name">{{$testimonial->name}}</div>
									<small class="desig">{{$testimonial->designation}}</small>
									<p class="details">{{ substr($testimonial->description, 0, 50) }} </p>
									<ul>
										@for ($i = 0; $i < 5; $i++)
											@if($testimonial->review >$i)
												<li><i class="fa fa-star secondary-text-color" aria-hidden="true"></i></li>
											@else
												<li><i class="fa fa-star rating" aria-hidden="true"></i></li>
											@endif
										@endfor                  
									</ul>
							</div>
						</div>
					@endforeach
				</div>
			</div>  
		</div>
	</section>
	@endif
@stop

@push('scripts')
	<script type="text/javascript" src='https://maps.google.com/maps/api/js?key={{ @$map_key }}&libraries=places'></script>
	<script type="text/javascript" src="{{ url('public/js/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('public/js/daterangepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('public/js/front.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('public/js/daterangecustom.min.js')}}"></script>
	<script type="text/javascript">
		$(function() {
			dateRangeBtn(moment(),moment());
		});
	</script>
@endpush 

