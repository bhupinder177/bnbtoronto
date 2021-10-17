@extends('admin.template')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                    <div class="col-md-3 settings_bar_gap">
                        @include('admin.common.settings_bar')
                    </div>
                    
                    <div class="col-md-9">
                    <div class="box box_info">
                            <div class="box-header">
                            <h3 class="box-title">Add Reasons</h3>
                            <form name="addreasons" method="get" action="{{URL::to('/').'/admin/settings/add-reasons'}}">
                            <!-- /.box-header -->
                            <div class="box-body">
                                
                                    <div class="form-group name">
                                                <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;">Title <span class="text-danger">*</span></label>
                                            <div class="col-sm-6">
                                            <input type="hidden" name="saveid" value="@isset($id){{$id}}@endisset">
                                            <input type="text" name="title" class="form-control " id="title"  placeholder="Title" value="@isset($title) {{$title}} @endisset">
                                            <span class="text-danger"></span>

                                        </div>
                                       
                                    </div><div style="clear: both;height: 19px"></div>
                                    <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;">Status <span class="text-danger">*</span></label>
                                        
                                        <div class="col-sm-6">
                                           <select name="status" class="form-control " >
                                               <option @isset($status) @if ($status=="Active")  selected @endif @endisset>Active</option>
                                               <option @isset($status) @if ($status=="Disabled")  selected @endif @endisset>Disabled</option>
                                           </select>
                                            <span class="text-danger"></span>
                                        </div>


                                    </div>

                                
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info btn-space">Submit</button>
<a class="btn btn-danger" href="{{URL::to('/').'/admin/settings/reasons'}}">Cancel</a>
                                                            </div>
                                                            </form>
                    </div>
                    </div>
            </div>
        </section>
    </div>
@endsection
