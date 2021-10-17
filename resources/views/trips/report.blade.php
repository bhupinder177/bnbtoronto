@extends('template')

@section('main')
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
								What's happening?
							</span>

							<div class="float-right">
								<div class="d-flex">
									
									<div>
										
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				




				</div>
			</div>
		</div>
	</div>
</div>
@stop
@push('scripts')
    <script type="text/javascript">
        $(document).on('change', '#trip_select', function(){

            $("#my-trip-form").trigger("submit"); 
              
        });
    </script>
@endpush