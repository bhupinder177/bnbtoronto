<!--================ Header Menu Area start =================-->
<?php
    $lang = Session::get('language');
?>
<style type="text/css">
   /*2-09-21 css start R-S*/
.headerform{ width:auto; float:left; margin-right: 25px; margin-bottom: 0px; display: flex; align-items: center; }
.headerform .form-group{ margin-bottom:0px; position:relative; margin-right: 12px;  }
.headerform .form-group .form-control{ background:#FFF; font-size:12px; font-weight: 400; color: #849090; border-radius:7px; line-height: normal; padding:0px 10px; height:30px;  position:relative; width: 200px; }
.headerform .form-group .fa-search:before{ color:#f2a054; }
.headerform .form-group .fa-searchicon{ width:35px; height: 30px; line-height:30px; background: transparent; border-radius: 7px; top: 0px; right: 0; position: absolute; border: 0; font-size: 14px; }
.modal-backdrop{ z-index: 999; }
.filtermodal{ font-size: 13px; border:none; line-height:30px; padding: 0px 15px;  border-radius: 7px; background: #FFF; border-color:#FFF; color:#f2a054; }
.filtermodal i{ font-size:10px; }
.filtermodal_mainbox  .modal-dialog{ max-width: 600px; }
.filtermodal_mainbox .modal-header{ padding:15px 20px; }
.filtermodal_mainbox .modal-header h5{ font-size: 18px; font-weight: 700; color: #101e29; }
.filterspopup input, .filterspopup select{ position: relative;  font-size: 13px; color: #101e29; line-height: 33px !important; padding: 0px 10px;  height: 33px !important;     border-radius: 7px;  box-shadow: none;  border: 1px solid #e6e6e6;}
.filterspopup .datepicker{ position: relative; }
.filterspopup .datepicker i{     color: #e19f63; position: absolute; top: 0; right: 0; line-height: 32px; font-size: 12px; width: 30px; text-align: center;}
h3.filtertitle{ padding: 10px 11px; font-size: 14px; font-weight: 600; }
.filtermodalfooter{  justify-content: space-between; }
.filtermodalfooter a.showallfilters{ color: #f2a054; font-weight:600; font-size: 14px; margin-left: 15px; }
.filtermodalfooter a.showallfilters:hover{ color:#000; }
.filtermodalfooter .btn.btn-primary{ background: #f2a054 !important; color: #FFF !important; font-weight: 600; text-align: center; line-height: 33px; border-radius: 7px; border:0px; font-size: 13px; width: 130px; padding:0px 10px;  }
.filtermodalfooter .btn.btn-primary:hover{ background:#e7e6e1 !important; color:#5d5f5a !important; }
.filtermodalfooter .btn.btn-secondary{ background:#e7e6e1 !important; color: #5d5f5a !important; font-weight: 600; text-align: center; line-height: 33px; border-radius: 7px;  border:0px; font-size: 13px; width: 130px; padding:0px 10px;  }
.filtermodalfooter .btn.btn-secondary:hover{background:#f2a054 !important; color: #FFF !important; }
.filterspopup .form-control:focus{ outline: none; }
.filtermodal_mainbox .modal-header .modal-header .close{ opacity: 0; }
.btn.btn-primary.filtermodal:hover{ background: #f2a054 !important; border-color: #f2a054 !important;  }
.modal.filtermodal_mainbox { top:13% !important; }
.text-color li i{ color: #f3a054; }
.vbtn-outline-success{ float: right; background: #f3a054; border: 0; color: #FFF; border-radius: 7px; padding: 7px 15px !important; font-size: 14px; line-height: normal; }
.dataTables_wrapper.no-footer table.dataTable tbody td a img{ width: 100px !important; object-fit: cover; height: 70px !important;  border-radius:7px !important; }
.dataTables_wrapper.no-footer table.dataTable thead th, .dataTables_wrapper.no-footer table.dataTable thead td{ font-size: 14px;  color:#101e29 !important; }
.dataTables_wrapper.no-footer .table-bordered td, .dataTables_wrapper.no-footer .table-bordered th{ font-size:14px !important; color:#101e29 !important; }
.dataTables_wrapper .dataTables_filter input{ background: #FFF; font-size: 12px; font-weight: 400; color: #849090;  border-radius: 7px;
    line-height: normal; padding: 0px 10px;  height: 30px;  position: relative; width: 200px; }
    .dataTables_wrapper .dataTables_info{ font-size: 14px; }
   .dataTables_wrapper .dataTables_paginate{ font-size: 14px; margin-top:0px !important;  } 
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{  background: transparent !important; color: #f2a054 !important; }
div.dataTables_filter label{ font-size: 14px; }
/*.list-bacground.mt-4.rounded-3.p-4.border{ position: absolute; width: 100%; }*/
.container-fluid.min-height{ position: relative; }
div.dataTables_length select { width: 50px; display: inline-block; height: 35px; line-height: normal; padding: initial;
    background: #FFF; font-size: 14px; font-weight: 400; color: #849090; border-radius: 2px;  line-height: normal;  border: 1px solid #849090;
    padding: 0px 5px; }
.modal.filtermodal_mainbox .close{ opacity: 0 !important; } 
.text-color li i { color: #f3a054 !important; width: 40px; text-align: center; background:#f8f8f8 !important; color: #FFF; line-height: 40px;
    border-radius: 10px; }  
li.active-sidebar i { border-left: 0px !important; background: #f3a054 !important; color: #FFF !important; }
.active-sidebar{ background: transparent !important;  }
li.active-sidebar  { border-left: 0px !important; }
#headertop  { position: relative !important; left: 0px!important; width: 100%!important;  right: 0px !important; border-radius: 0px 0px 15px 15px;  }
.property_tablebox{ margin-top:25px !important; }
.property_tablebox .col-lg-2 .main-panel{ border-radius:10px !important; box-shadow: 0px 0px 10px rgba(0,0,0,0.1) !important; margin-top: 0px !important; }
.row.m-0.property_tablebox .col-lg-2.border-right { margin-top: 0px !important; padding:0px 0px 20px 0px !important;  overflow: visible !important; border: 0px !important; height: auto !important;  }
.vbg-default-hover:hover { background: transparent !important; }
.list-bacground.mt-4.rounded-3.p-4.border{ background: #FFF !important; box-shadow: 0px 0px 10px rgb(0 0 0 / 10%) !important;
    margin-top: 0 !important;  padding: 15px !important; border-radius: 10px !important; }
 .property_tablebox a.btn.vbtn-outline-success.text-16.font-weight-700.pl-5.pr-5.pt-3.pb-3.mt-4.mb-4{     margin-top: 0px!important;
    margin-bottom: 0px !important; } 
  .property_tablebox .col-lg-2 .main-panel .mt-2{ margin-top: 0px !important; }    
.form-control:focus, [contenteditable].form-control:focus, [type=email].form-control:focus, [type=password].form-control:focus, [type=tel].form-control:focus, [type=text].form-control:focus, input.form-control:focus, input[type=email]:focus, input[type=number]:focus, input[type=password]:focus, input[type=text]:focus, select.form-control:focus, textarea.form-control:focus, textarea:focus{ outline:none !important; }
.listings_toptable .listingtitile{ color: #3d4b4c !important; font-size: 14px; font-family: 'Poppins'!important; }
.listings_toptable .listingtitile span{ color:#f0a154 !important; }
.list-bacground.mt-4.rounded-3.p-4.border { width:100%; float: left; display: flex; align-items: center; justify-content: space-between; }
.float-right.formsearch .form-control{ margin-left: 50px; height: 30px !important;  line-height: 30px; padding: 0px 4px; border-radius: 7px; font-size: 13px; }
.float-right.formsearch .headerform{ margin-right:70px !important; }
.float-right.formsearch { display: flex; }
.float-right.formsearch .d-flex{ display: block !important; }
.property_tablebox a.btn.vbtn-outline-success.text-16.font-weight-700.pl-5.pr-5.pt-3.pb-3.mt-4.mb-4{ line-height: 30px;
    padding: 0px 15px !important; font-size: 14px; }
.products_table_main{border:0px !important;  }
.products_table_main th, .products_table_main td { border: none !important; padding:10px 10px !important; vertical-align: middle !important;
font-size: 13px !important; color: #314E52 !important; }
.products_table_main th{ padding-left: 0px !important; padding-right: 0px !important; padding-bottom: 25px !important; }
.products_table_main td a img.img-fluid { width: 100px; height: 60px !important; border-radius: 10px !important; object-fit: cover !important; }
.products_table_main  tr td:first-child{ border-radius: 10px 0px 0px 10px !important; }
.products_table_main  tr td:last-child{ border-radius: 0px 10px 10px 0px !important; }
.products_table_main  tbody tr:nth-of-type(odd){ background-color: #FFF !important;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 10%) !important; }
body{background: #f8f8f8 !important; }
.property_tablebox ul.list-group.list-group-flush.pl-3 a{ margin-top: 0px !important; }
.products_table_container{ width: 100%; float: left; }
@media(max-width:1199.98px){
   .dataTables_wrapper{ overflow: scroll !important; } 
   .dataTables_wrapper table{ width: 1300px !important; } 
   .header_area .navbar .nav .nav-item { margin-right: 10px !important; }
   .header_area .navbar .nav .nav-item .nav-link{ font-size: 10px !important;  }
   .headerform .form-group .form-control{ width: 175px; }
/*4-9-21*/
.products_table_container{ overflow: scroll; } 
.products_table_main{  width: 1200px !important;  }
}
@media(max-width: 991.98px){
.property_tablebox .container-fluid.min-height.pr-0{ padding-left:0px !important; } 
.property_tablebox .col-lg-10.pr-0{  padding-left:0px !important; }
}
@media(max-width:767.98px){
.float-right.formsearch .headerform { margin-right: 10px !important; }
.float-right.formsearch .form-control{ margin-left: 0px !important; }
}
@media(max-width:575px){
 .list-bacground.mt-4.rounded-3.p-4.border{ display: block !important; }
 .listings_toptable .listingtitile{ width: 100%; float: left; }
 .float-right.formsearch { display: inline-block; text-align: center; width: 100%; }
.float-right.formsearch .headerform{ width: 100%; float: left; text-align: center;display: block; margin: 10px 0px 0px !important; } 
.float-right.formsearch .headerform .form-group{     margin-right:0px; }
#exampleFormControlSelect1{ height: 30px !important; }
.float-right.formsearch .headerform .form-group .form-control{ width: 100% !important; }
.float-right.formsearch .form-control{ margin-bottom: 10px !important; }
.property_tablebox a.btn.vbtn-outline-success.text-16.font-weight-700.pl-5.pr-5.pt-3.pb-3.mt-4.mb-4{ width: 100% !important; margin-top:0px !important; }
} 
.login-bk{
  background: #FFF !important;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 10%) !important;
    margin-top: 0 !important;
    padding: 15px !important;
    border-radius: 10px !important;
}
.title_login {
  font-size: 16px;
    font-weight: bold;
}
.orange{
  color: #f3a054;
}
.signup{font-size: 13px;}
body{font-family: Poppins}
/*2-09-21 css end R-S*/ 
</style>
<style>
        .input-icons i {
            position: absolute;
        }
          
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .icon {
            padding: 15px;
            min-width: 40px;
        }
          
        .input-field {
            width: 100%;
            padding-left: 40px;
        }
    </style>
<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type')}}">
<header id="headertop" class="header_area  animated fadeIn">
    <div class="main_menu">

<!---// modal start  \\--->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid container-fluid-90">
                <a class="navbar-brand logo_h" aria-label="logo" href="{{ url('/') }}"><img src="{{ $logo ?? '' }}" alt="logo" class="img-130x32"></a>
				<!-- Trigger Button -->
				<a href="#" aria-label="navbar" class="navbar-toggler" data-toggle="modal" data-target="#left_modal">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
                </a>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <div class="nav navbar-nav menu_nav justify-content-end">
<!---// headerform start  \\--->
@php
if(Route::current()->uri()=="search"){
@endphp
<form class="headerform">
  <div class="form-group">
      <input type="text" class="form-control" placeholder="Where are you doing?" id="">
      <button class="btn btn-success fa-searchicon"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
      <div class="filterbtnhd"> <button type="button" class="btn btn-primary filtermodal" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Filters <i class="fa fa-align-justify" aria-hidden="true"></i></button></div>
</form>
@php
}
@endphp
<!---// headerform end  \\--->
                         <div class="nav-item">
                                    <!--  -->
                                    <div class="dropdown">
                                        <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown"  aria-label="signup" style="color: white" >Contact Us</a>

                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <div class="col-md-12" style="width: 400px;font-size: 14px">
                                                    <h3>Call us:</h3>

                                                    <p>Service hours: 5:00am-10:00am Monday to Friday</p>
                                                    <p>Support Manila: (02) 8565 2565</p>
                                                    <hr>

                                                    <p>Service hours: 5:00am-10:00am Monday to Friday</p>
                                                    <p>Support Toronto: (02) 8565 2565</p>

                                            </div>
                                      </div>
                    </div>
                         </div>
                           @isset(Auth::user()->user_type)
                                    @if(Auth::user()->user_type == 'guest')
                                    @else




                                    @if(Request::segment(1) != 'help' )
                                        <div class="nav-item" >
                                            <a class="nav-link" href="{{ url('property/create') }}" aria-label="signup" >List your space</a>
                                        </div>
                                    @endif
                             @endif
                        @endisset

                        @if(!Auth::check())
                          <div class="nav-item">
                                    <a class="nav-link" href="{{ url('property/create') }}" aria-label="signup" >List your space</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{ url('signup') }}" aria-label="signup" >{{trans('messages.sign_up.sign_up')}}</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}" aria-label="login">{{trans('messages.header.login')}}</a>
                            </div>
                        @else
                            <div class="d-flex">
                                <div>
                                    <div class="nav-item mr-0">
                                    <img src="{{Auth::user()->profile_src}}" class="head_avatar" alt="{{Auth::user()->first_name}}">
                                </div>
                                </div>
                                <div>
                                <div class="nav-item ml-0 pl-0">
                                    <div class="dropdown">
                                        <a href="javascript:void(0)" class="nav-link dropdown-toggle text-15" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-label="user-profile" aria-haspopup="true" aria-expanded="false" style="color: white!important">
                                            {{Auth::user()->first_name}}
                                        </a>
                                        <div class="dropdown-menu drop-down-menu-left p-0 drop-width text-14" aria-labelledby="dropdownMenuButton">

                                            @php
                                            if(Route::current()->uri()=="dashboard"){
                                            @endphp
                                            <a class="vbg-default-hover border-0  font-weight-700 list-group-item vbg-default-hover border-0" href="{{ url('/') }}" aria-label="dashboard">
                                                  <!-- <a class="vbg-default-hover border-0  font-weight-700 list-group-item vbg-default-hover border-0" href="{{ url('/') }}" aria-label="dashboard"> -->Home
                                            </a>
                                            @php
                                                }else{
                                            @endphp

<a class="vbg-default-hover border-0  font-weight-700 list-group-item vbg-default-hover border-0" href="{{ url('dashboard') }}" aria-label="dashboard">
                                                  <!-- <a class="vbg-default-hover border-0  font-weight-700 list-group-item vbg-default-hover border-0" href="{{ url('/') }}" aria-label="dashboard"> -->Dashboard
                                            </a>

                                            @php
                                            }
                                            @endphp

                                           <!--  <a class="font-weight-700 list-group-item vbg-default-hover border-0 " href="{{ url('users/profile') }}" aria-label="profile">{{trans('messages.utility.profile')}}</a> -->
                                            <a class="font-weight-700 list-group-item vbg-default-hover border-0 " href="{{ url('users/show/') }}/{{Auth::user()->id}}" aria-label="profile">My Profile </a>
                                            <a class="font-weight-700 list-group-item vbg-default-hover border-0 " href="{{ url('logout') }}" aria-label="logout">{{trans('messages.header.logout')}}</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<div style="clear: both;height:25px;"></div>
<!-- Modal Window -->
<div class="modal left fade" id="left_modal" tabindex="-1" role="dialog" aria-labelledby="left_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 secondary-bg">
                @if(Auth::check())
                    <div class="row justify-content-center">
                        <div>
                            <img src="{{Auth::user()->profile_src}}" class="head_avatar" alt="{{Auth::user()->first_name}}">
                        </div>

                        <div>
                            <p  class="text-white mt-4"> {{Auth::user()->first_name}}</p>
                        </div>
                    </div>
                @endif

                <button type="button" class="close text-28" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>

            <div class="modal-body">
                <ul class="mobile-side">
                    @if(Auth::check())
                        <li><a href="{{ url('dashboard') }}"><i class="fa fa-tachometer-alt mr-3"></i>{{trans('messages.header.dashboard')}}</a></li>
                        <li><a href="{{ url('inbox') }}"><i class="fas fa-inbox mr-3"></i>{{trans('messages.header.inbox')}}</a></li>
                        <li><a href="{{ url('properties') }}"><i class="far fa-list-alt mr-3"></i>{{trans('messages.header.your_listing')}}</a></li>
                        <li><a href="{{ url('my-bookings') }}"><i class="fa fa-bookmark mr-3"></i>{{trans('messages.booking_my.booking')}}</a></li>
                        <li><a href="{{ url('trips/active') }}"><i class="fa fa-suitcase mr-3"></i> {{trans('messages.header.your_trip')}}</a></li>
                        <li><a href="{{ url('users/payout-list') }}"><i class="far fa-credit-card mr-3"></i> {{trans('messages.sidenav.payouts')}}</a></li>
                        <li><a href="{{ url('users/transaction-history') }}"><i class="fas fa-money-check-alt mr-3 text-14"></i> {{trans('messages.account_transaction.transaction')}}</a></li>
                        <li><a href="{{ url('users/profile') }}"><i class="far fa-user-circle mr-3"></i>{{trans('messages.utility.profile')}}</a></li>
                        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <li><i class="fas fa-user-edit mr-3"></i>{{trans('messages.sidenav.reviews')}}</li>
                        </a>

                        <div class="collapse" id="collapseExample">
                            <ul class="ml-4">
                                <li><a href="{{ url('users/reviews') }}" class="text-14">{{trans('messages.reviews.reviews_about_you')}}</a></li>
                                <li><a href="{{ url('users/reviews_by_you') }}" class="text-14">{{trans('messages.reviews.reviews_by_you')}}</a></li>
                            </ul>
                        </div>
                        <li><a href="{{ url('logout') }}"><i class="fas fa-sign-out-alt mr-3"></i>{{trans('messages.header.logout')}}</a></li>
                    @else
                        <li><a href="{{ url('signup') }}"><i class="fas fa-stream mr-3"></i>{{trans('messages.sign_up.sign_up')}}</a></li>
                        <li><a href="{{ url('login') }}"><i class="far fa-list-alt mr-3"></i>{{trans('messages.header.login')}}</a></li>
                    @endif

                    @if(Request::segment(1) != 'help')
                        <a href="{{ url('property/create') }}">
                            <button class="btn vbtn-outline-success text-14 font-weight-700 pl-5 pr-5 pt-3 pb-3">
                                    {{trans('messages.header.list_space')}}
                            </button>
                        </a>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!--================Header Menu Area =================-->
<!---// modal start  \\--->
<div class="modal fade filtermodal_mainbox" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter your property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="filterspopup">
      <div class="row">
       <div class="col-lg-4 col-md-12 col-sm-12">
       <div id="date-picker-example1" class="md-form md-outline input-with-post-icon datepicker" inline="true">
  <input placeholder="check in" type="text" id="example1" class="form-control">
  <i class="fas fa-calendar input-prefix"></i>
</div>
       </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
       <div id="date-picker-example2" class="md-form md-outline input-with-post-icon datepicker" inline="true">
  <input placeholder="check Out" type="text" id="example2" class="form-control">
  <i class="fas fa-calendar input-prefix"></i>
</div>
       </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
      <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
       </div>
   </div>
   <div class="clearfex"></div>
      <h3 class="filtertitle">Size</h3>
   <div class="clearfex"></div>

    <div class="row">
         <div class="col-lg-4 col-md-12 col-sm-12">
      <select class="form-control" id="exampleFormControlSelect2">
      <option>1 Bedrooms</option>
      <option>2 Bedrooms</option>
      <option>3 Bedrooms</option>
      <option>4 Bedrooms</option>
      <option>5 Bedrooms</option>
    </select>
         </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
      <select class="form-control" id="exampleFormControlSelect3">
      <option>1 Boothrooms</option>
      <option>2 Boothrooms</option>     
    </select>
         </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
      <select class="form-control" id="exampleFormControlSelect4">
      <option> Beds</option>
      <option> Beds</option>
      </select>
      </div>
    </div> 
    <div class="clearfex"></div>
      <h3 class="filtertitle">Type</h3>
    <div class="clearfex"></div>
      <div class="row">
         <div class="col-lg-4 col-md-12 col-sm-12">
      <select class="form-control" id="exampleFormControlSelect2">
      <option>Room type</option>
       <option>Room type</option>
    </select>
         </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
      <select class="form-control" id="exampleFormControlSelect3">
      <option>Book</option>
      <option>2 Boothrooms</option>     
    </select>
         </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
      <select class="form-control" id="exampleFormControlSelect4">
      <option> Price Range</option>
      <option> Beds</option>
      </select>
      </div>
    </div>
        </form>
      </div>
      <div class="modal-footer filtermodalfooter">
        <a href="#" class="showallfilters">Show All Filter</a>
        <span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Apply Filters</button>
         </span>
      </div>
    </div>
  </div>
</div>
<!---// modal end  \\--->
