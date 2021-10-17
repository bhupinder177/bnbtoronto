	@extends('admin.template')
	@section('main')
	<div class="content-wrapper">
		<section class="content-header">
			<h1>Chat<small>Filter</small></h1>
			@include('admin.common.breadcrumb')
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
					    <form class="form-horizontal" action="{{url('admin/add-chat-filter')}}" id="add_customer" method="post" name="add-chat-filter" accept-charset='UTF-8'>
                    {{ csrf_field() }}
                    <div class="box-body">
                    <input type="hidden" name="default_country" id="default_country" class="form-control">
                    <input type="hidden" name="carrier_code" id="carrier_code" class="form-control">
                    <input type="hidden" name="formatted_phone" id="formatted_phone" class="form-control">
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="control-label col-sm-3">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" id="title" placeholder="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1" class="control-label col-sm-3">Status</label>
                            <div class="col-sm-8">
                            <select class="form-control" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
             
                    <button type="reset" class="btn btn-danger" style="float:right;margin-left: 15px">Cancel</button>       <button type="submit" class="btn btn-info" id="submitBtn" style="float:right">Submit</button>
                    </div>
                </form>
            </div>
            </div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<!-- <div class="box-header">
							<h3 class="box-title">Chat Filter </h3>
							@if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'add_customer'))
							<div class="pull-right"><a class="btn btn-success" href="{{ url('admin/add-chat-filter') }}">Add Filter</a></div>
							@endif
						</div> -->
					
						<div class="box-body">
							<div class="table-responsive">
								{!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	@endsection

	@push('scripts')
	<script src="{{ asset('public/backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
	{!! $dataTable->scripts() !!}
	@endpush

	@section('validate_script')
	<script type="text/javascript">

	$('.select2').select2({
	// minimumInputLength: 3,
	ajax: {
		url: 'bookings/customer_search',
		processResults: function (data) {
		$('#customer').val('DSD');
			return {
				results: data
			};
		}
	}

	});

	// Date Time range picker for filter
	
	$(function() {

		var startDate         = $('#startDate').val();
		var endDate        = $('#endDate').val();
		dateRangeBtn(startDate,endDate, dt=1);
		formDate (startDate, endDate);

		$(document).ready(function(){
		$('#dataTableBuilder_length').after('<div id="exportArea" class="col-md-4 col-sm-4 "><div class="row mt-m-2"><div class="btn-group btn-margin"><button type="button" class="form-control dropdown-toggle w-80" data-toggle="dropdown" aria-haspopup="true">Export</button><ul class="dropdown-menu d-menu-min-w"><li><a href="" title="CSV" id="csv">CSV</a></li><li><a href="" title="PDF" id="pdf">PDF</a></li></ul></div><div class="btn btn-group btn-refresh"><a href="" id="tablereload" class="form-control"><span><i class="fa fa-refresh"></i></span></a></div></div></div>');
		});
		//csv convert
		$(document).on("click", "#csv", function(event){
			event.preventDefault();
			var status = $('#status').val();
			var customer = $('#customer').val();
			var to = $('#endDate').val();
			var from = $('#startDate').val();
			window.location = "customer/customer_list_csv?to="+to+"&from="+from+"&status="+status+"&customer="+customer;
		});

		//pdf convert
		$(document).on("click", "#pdf", function(event){
			event.preventDefault();
			var status = $('#status').val();
			var customer = $('#customer').val();
			var to = $('#endDate').val();
			var from = $('#startDate').val();
			window.location = "customer/customer_list_pdf?to="+to+"&from="+from+"&status="+status+"&customer="+customer;
		});

		//reload Datatable
		$(document).on("click", "#tablereload", function(event){
			event.preventDefault();
			$("#dataTableBuilder").DataTable().ajax.reload();
		});
	});


	$( "#guestbtn" ).click(function() {

				$('input[type="search"]').val('guest').keyup();
	});
	$( "#hostbtn" ).click(function() {

				$('input[type="search"]').val('host').keyup();
	});
	</script>
	@endsection