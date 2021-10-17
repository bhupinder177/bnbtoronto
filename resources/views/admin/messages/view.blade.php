@extends('admin.template') 
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box box_info">
          <div class="box-header">
            <h3 class="box-title">Customer Message Management</h3>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              {!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0'])
              !!}
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
  // Select 2 for property search
  $('.select2').select2({
  // minimumInputLength: 3,
  ajax: {
      url: 'bookings/property_search',
      processResults: function (data) {
        $('#property').val('DSD');
        return {
          results: data
        };
      }
    }
  });

  // Date Time range picker for filter

$(function() {
      const start = Date.now();
      // * Set the time range for daterangepicker
      var startDate      = "1990-1-1";
      var endDate        = start;
      dateRangeBtn(startDate,endDate, dt=1);
      formDate (startDate, endDate);
      $(document).ready(function(){
         $('#dataTableBuilder_length').after('<div id="exportArea" class="col-md-4 col-sm-4 "><div class="row mt-m-2"><div class="btn-group btn-margin"><button type="button" class="form-control dropdown-toggle w-80" data-toggle="dropdown" aria-haspopup="true">Export</button><ul class="dropdown-menu d-menu-min-w"><li><a href="" title="CSV" id="csv">CSV</a></li></ul></div><div class="btn btn-group btn-refresh"><a href="" id="tablereload" class="form-control"><span><i class="fa fa-refresh"></i></span></a></div></div></div>');



      });

  

      $(document).on("click", "#csv", function(event){
      event.preventDefault();
        // var property = $('#property').val();
        // var status = $('#status').val();
        // var types = $('#types').val();
        // var to = $('#endDate').val();
        // var from = $('#startDate').val();
      window.location = "messages/messages_list_csv";
    });


      //reload Datatable
      $(document).on("click", "#tablereload", function(event){
        event.preventDefault();
        $("#dataTableBuilder").DataTable().ajax.reload();
      });
});

</script>

@endsection