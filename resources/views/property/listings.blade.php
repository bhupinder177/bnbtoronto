@extends('template')
<style type="text/css">

.label-danger {
    background-color: #d9534f;
}
.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}

.label-success {
    background-color: #5cb85c;
}
.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}
.list-bacground.mt-4.rounded-3.p-4.border {
    border: 0!important;
    background: none;
}
a.btn.vbtn-outline-success.text-16.font-weight-700.pl-5.pr-5.pt-3.pb-3.mt-4.mb-4 {
    margin-top: -13px!important;
}
.toggleSwitch>span:before {
    content: '';
    display: block;
    width: 120px!important;
    height: 29px!important;
    position: absolute;
    left: 0;
    top: -2px;
    background-color: #efefef;
    border: 1px solid #efefef;
    border-radius: 30px;
    -webkit-transition: all .2s ease-out;
    -moz-transition: all .2s ease-out;
    transition: all .2s ease-out;
}
.toggleSwitch.large a {
    width: 20px!important;
    height: 20px!important;
}

</style>
<!-- <link href="css/dataTables.min.css" rel="stylesheet">
MDBootstrap Datatables 
<script type="text/javascript" src="js/dataTables.min.js"></script> -->
<!--datatable style-->
			<link rel="stylesheet" href="http://bnbtoronto.ca/public/backend/plugins/datatables/dataTables.bootstrap.css">
			<link rel="stylesheet" href="http://bnbtoronto.ca/public/backend/plugins/datatables/jquery.dataTables.css">
			<link rel="stylesheet" href="http://bnbtoronto.ca/public/backend/plugins/DataTables-1.10.18/css/jquery.dataTables.min.css">
			<link rel="stylesheet" href="http://bnbtoronto.ca/public/backend/plugins/Responsive-2.2.2/css/responsive.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="http://flexslider.woothemes.com/css/flexslider.css">
@section('main')
    <div class="property_bannerbox">
        <img class="img-fluid w-100" src="images/banner.png" alt="cover_photo">
 <!--        <div class="flexslider">
  <ul class="slides">
    <li>
     <img class="img-fluid " src="images/banner.png" alt="cover_photo">
    </li>
    <li>
        <img class="img-fluid " src="images/banner.png" alt="cover_photo">
    </li>

  </ul>
</div> -->
<div class="margin-top-25">

        
    </div>
    <div class="row m-0 property_tablebox">
        @include('users.sidebar')

        <div class="col-lg-10 pr-0">
            <div class="main-panel">
                <div class="container-fluid min-height pr-0">
                    <div class="row">
                               
                        <div class="col-md-12 p-0 mb-3">
                            <div class="list-bacground mt-4 rounded-3 p-4 border listings_toptable">

                                <span class="text-18 pt-4 pb-4 font-weight-700 listingtitile"><span>{{ count($properties) }}</span> {{trans('messages.listing_basic.listing')}}

                                </span>
                                
                                <div class="float-right formsearch">
                                  <form class="headerform">
                                      <div class="form-group">
                                         <input type="text" class="form-control" placeholder="Search" id="">
                                              <button class="btn btn-success fa-searchicon"><i class="fa fa-search" aria-hidden="true"></i></button>
                                          </div>
                                  <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                <option>2</option>
                              <option>3</option>
                                 <option>4</option>
                               <option>5</option>
                                    </select>
                                  </form>

                                    <div class="d-flex">
                                        <div class="pr-4">

                           <!--                  <span class="text-14 pt-2 pb-2 font-weight-700">{{trans('messages.users_dashboard.sort_by')}}</span> -->
                                        </div>

                                        <div>
                                           <!--  <form action="{{ url('/properties') }}" method="POST" id="listing-form">
                                                {{ csrf_field() }}
                                                <select class="form-control text-center text-14 minus-mt-6" id="listing_select" name="status">
                                                    <option value="All" {{ @$status == "All" ? ' selected="selected"' : '' }}>{{trans('messages.filter.all')}}</option>
                                                    <option value="Listed" {{ @$status == "Listed" ? ' selected="selected"' : '' }}>{{trans('messages.property.listed')}}</option>
                                                    <option value="Unlisted" {{ @$status == "Unlisted" ? ' selected="selected"' : '' }}>{{trans('messages.property.unlisted')}}</option>
                                                </select>
                                            </form> -->
                                             <a href="http://bnbtoronto.ca/property/create" class="btn vbtn-outline-success text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 mt-4 mb-4" style="float: right" >Create Listing</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@isset($deletemsg) 

 <div class="alert alert-success" role="alert" id="alert">
                       {{$deletemsg}}
                    </div>

 @endisset
                    <div class="alert alert-success d-none" role="alert" id="alert">
                        <span id="messages"></span>
                    </div>
                    
                    <div id="products" class="row mt-3">
                         <div class="products_table_container">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm products_table_main" cellspacing="0" width="100%"style="font-family:  arial;">
                          <thead>  <tr>
                                     <th>Listing</th>
                                     <th style="min-width: 150px;"></th>
                                     <th style="text-align: center;">Booking</th>
                                     <th style="text-align: center; ">Bedrooms</th>
                                     <th style="text-align: center; width: 100px;">Beds</th>
                                     <th style="text-align: center; width: 100px;">Baths</th>
                                     <th>Price</th>
                                     <th style="text-align: center;">Status</th>
                                     <th style="text-align: center;">Action</th>
                            </tr></thead>

                        <tbody>
                        @forelse($properties as $property)
                            <tr>
                                <td style="width: 100px"> <a href="{{ url('listing/'.$property->id.'/basics') }}" target="_blank">
                         <img class="img-fluid rounded" src="{{ $property->cover_photo }}" alt="cover_photo" style="width: 100px">
                                            </a>  </td>
                                <td> <!-- <a href="properties/{{ $property->id }}"> --><a href="{{ url('listing/'.$property->id.'/basics') }}" target="_blank">
                         <p class="mb-0 text-18 text-color font-weight-700 text-color-hover" style="font-size: 14px">{{ ($property->name == '') ? '' : $property->name }}</p>     
                                            </a> {{$property->property_description->internal_name}} <!-- {{$property->property_address->address_line_1}} --></td>
                                 <td style="text-align: center;">{{$property->booking_type}}</td>
                                  <td style="text-align: center;">{{$property->bedrooms}}</td>
                                   <td style="text-align: center;">{{$property->beds}}</td>
                                    <td style="text-align: center;">{{$property->bathrooms}}</td>
                                    <td>
                                        <span class="font-weight-100">{!! moneyFormat( $property->property_price->currency->symbol, $property->property_price->price) !!}</span> / {{trans('messages.property_single.night')}}</span>
                                    </td>
                                     <td style="text-align: center;">

                                      @if($property->status=="Listed")
                                            <span class="label label-success">{{$property->status}}</span>
                    
                                            @else
                                            <span class="label label-danger">{{$property->status}}</span>
                                    @endif
                                     </td>
                                     <td style="text-align: center;"> <div class="main-toggle-switch text-center text-sm-center">
                                                            @if($property->steps_completed == 0)
                                                            <label class="toggleSwitch large" onclick="">
                                                                <input type="checkbox" id="status" data-id="{{ $property->id}}" data-status="{{$property->status}}"  {{ $property->status == "Listed" ? 'checked' : '' }}/>                
                                                                <span>
                                                                    <span>{{trans('messages.property.listed')}}</span>
                                                                    <span>{{trans('messages.property.unlisted')}}</span>
                                                                </span>
                                                                <a href="#" aria-label="toggle"></a>             
                                                            </label>
                                                            @else
                                                            <a href="{{ url('listing/'.$property->id.'/basics') }}" target="_blank">
                                                            <span class="badge badge-warning p-3 pl-4 pr-4 text-14 border-r-25">{{ $property->steps_completed }} {{trans('messages.property.step_listed')}}</span>
                                                        </a>
                                                            @endif
                                                        </div>
                                                        <div style="clear: both;height: 5px;"></div>
                                                      <center> <a href="?deletebtn={{$property->id}}" style="font-size: 14px;color: red;margin-top: 50px;">Delete</a></center> 
                                                    </td>
                            </tr>
                            <div class="col-md-12 p-0 mb-4" style="display: none">
                                <div class=" row  border p-2 rounded-3">
                                    <div class="col-md-2 col-xl-2 p-2">
                                        <div class="img-event">
                                           <!--  <a href="properties/{{ $property->id }}"> -->
                                            <a href="{{ url('listing/'.$property->id.'/basics') }}">
                                                <img class="img-fluid rounded" src="{{ $property->cover_photo }}" alt="cover_photo" style="width: 200px">
                                            </a>  
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xl-8 p-2">
                                        <div>
                                            <a href="properties/{{ $property->id }}">
                                                <p class="mb-0 text-18 text-color font-weight-700 text-color-hover">{{ ($property->name == '') ? '' : $property->name }}</p>    

                                            </a>
                                        </div>

                                        <p class="text-14 mt-3 text-muted mb-0">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$property->property_address->address_line_1}}
                                        </p>

                                        <div class="review-0 mt-4">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <span><i class="fa fa-star text-14 secondary-text-color"></i>
                                                        @if( $property->reviews_count)
                                                            {{ $property->avg_rating }}
                                                        @else
                                                            0
                                                        @endif 
                                                        ({{ $property->reviews_count }})
                                                    </span>
                                                </div>
                                            
                                                <div class="pr-5">
                                                    <span class="font-weight-100 ">{!! moneyFormat( $property->property_price->currency->symbol, $property->property_price->price) !!}</span> / {{trans('messages.property_single.night')}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-inline mt-2 pb-3" style="display: none">
                                            <li class="list-inline-item border rounded-3 p-1 mt-4 pl-3 pr-3">
                                                <p class="text-center mb-0">
                                                    <i class="fas fa-bed text-20 d-none d-sm-inline-block text-muted"></i> 
                                                    {{ $property->accommodates }}
                                                    <span class=" text-14 font-weight-700">{{trans('messages.property_single.bed')}}</span> 
                                                </p>
                                            </li>
                                            <li class="list-inline-item  border rounded-3 mt-4 p-1  pl-3 pr-3">
                                                <p  class="text-center mb-0" >
                                                    <i class="fas fa-user-friends d-none d-sm-inline-block text-20 text-muted"></i>
                                                    {{ $property->bedrooms }}
                                                    <span class=" text-14 font-weight-700">{{trans('messages.property_single.guest')}}</span> 
                                                </p>
                                            </li>
                                            <li class="list-inline-item  border rounded-3 mt-4 p-1  pl-3 pr-3">
                                                <p  class="text-center mb-0">
                                                    <i class="fas fa-bath text-20  d-none d-sm-inline-block  text-muted"></i>
                                                    {{ $property->bathrooms }}
                                                    <span class="text-14 font-weight-700">{{trans('messages.property_single.bathroom')}}</span> 
                                                </p>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 col-xl-2">
                                        <div class="d-flex w-100 h-100  mt-3 mt-sm-0 p-2">
                                            <div class="align-self-center w-100">
                                                <div class="row">
                                                    <div class="col-6 col-sm-12">
                                                        <div class="main-toggle-switch text-left text-sm-center">
                                                            @if($property->steps_completed == 0)
                                                            <label class="toggleSwitch large" onclick="">
                                                                <input type="checkbox" id="status" data-id="{{ $property->id}}" data-status="{{$property->status}}"  {{ $property->status == "Listed" ? 'checked' : '' }}/>                
                                                                <span>
                                                                    <span>{{trans('messages.property.listed')}}</span>
                                                                    <span>{{trans('messages.property.unlisted')}}</span>
                                                                </span>
                                                                <a href="#" aria-label="toggle"></a>             
                                                            </label>
                                                            @else
                                                            
                                                            <span class="badge badge-warning p-3 pl-4 pr-4 text-14 border-r-25">{{ $property->steps_completed }} {{trans('messages.property.step_listed')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-6 col-sm-12">
                                                        <a href="{{ url('listing/'.$property->id.'/basics') }}">
                                                            <div class="text-color text-color-hover text-14 text-right text-sm-center mt-0 mt-md-3 p-2">
                                                                <i class="fas fa-edit"></i> 
                                                                {{trans('messages.property.manage_list_cal')}} 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row jutify-content-center position-center w-100 p-4 mt-4">
                                <div class="text-center w-100">
                                    <img src="{{ url('public/img/unnamed.png')}}" class="img-fluid"   alt="Not Found">
                                    <p class="text-center">{{trans('messages.message.empty_listing')}}</p>
                                </div>
                            </div>
                        @endforelse
                    </tbody>
                         </table>
                     </div>
                    </div>

                    <div class="row justify-content-between overflow-auto  pb-3 mt-4 mb-5">
                        {{ $properties->appends(request()->except('page'))->links('paginate')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="http://bnbtoronto.ca/public/backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="http://bnbtoronto.ca/public/backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="http://flexslider.woothemes.com/js/jquery.flexslider.js"></script>
<script type="text/javascript">

 jquery(window).load(function(){
      jquery('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          jquery('body').removeClass('loading');
        }
      });
    });

	$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
    $(document).on('click', '#status', function(){
        var id = $(this).attr('data-id');
        var datastatus = $(this).attr('data-status');
        var dataURL = APP_URL+'/listing/update_status';
        $('#messages').empty();
        $.ajax({
            url: dataURL,
            data:{
                "_token": "{{ csrf_token() }}",
                'id':id,
                'status':datastatus,
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $("#status").attr('data-status', data.status)
                $("#messages").append("");
                $("#alert").removeClass('d-none');
                $("#messages").append(data.name+" "+"has been"+" "+data.status+".");
                var header = $('#alert');
                setTimeout(function() {
                    header.addClass('d-none');
                }, 4000);
            }
        });
    });

     $(document).on('change', '#listing_select', function(){

            $("#listing-form").trigger("submit"); 
              
    });

</script>
@endpush

   
