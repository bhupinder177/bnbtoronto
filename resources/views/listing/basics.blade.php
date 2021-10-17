@extends('template')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
@section('main')
<style type="text/css">
	button.btn.dropdown-toggle.btn-default {
    height: 41px;
    font-size: 15px;
    border: 1px solid lightgray;
}
span.text {
    font-size: 16px;
}
header.header_area.animated.fadeIn {
    padding-top: 25px;
}
img.img-130x32 {
    margin-top: -21px;
}
#bedtypes{
	border: 1px solid lightgray;
	padding: 10px;
}
</style>
<div class="margin-top-85">
	<div class="row m-0">
		<!-- sidebar start-->
		@include('users.sidebar')
		<!--sidebar end-->
		<div class="col-md-10">
			<div class="main-panel min-height mt-4">
				<div class="row">
					<div class="col-md-3 pl-4 pr-4">
						@include('listing.sidebar')
					</div>

					<div class="col-md-9  mt-4 mt-sm-0 pl-4 pr-4">

						<a href="{{ url('properties/'.$property_id) }}" style="font-size: 18px;float: right" target="_blank">Preview Listing</a>
						<div style="clear: both;height: 1px"></div>
						<form method="post" action="{{url('listing/'.$result->id.'/'.$step)}}"  accept-charset='UTF-8' id="listing_bes">
							{{ csrf_field() }}
							<div class="form-row mt-4 border rounded pb-4">
								<div class="form-group col-md-12 main-panelbg pb-3 pt-3">
									<h4 class="text-18 font-weight-700 pl-3">{{trans('messages.listing_basic.room_bed')}}</h4>
								</div>
							
								<div class="form-group col-md-6 pl-5 pr-5">
									<label for="inputState">{{trans('messages.listing_basic.bedroom')}}</label>
									<select name="bedrooms" id="basics-select-bedrooms"  class="form-control text-16 mt-2">
										@for($i=0;$i<=10;$i++)
										<option value="{{ $i }}" {{ ($i == $result->bedrooms) ? 'selected' : '' }}>
										{{ $i}}
										</option>
										@endfor 
									</select>
								</div>

								<div class="form-group col-md-6 pl-5 pr-5">
									<label for="inputState">{{trans('messages.listing_basic.bed')}}</label>
									<select name="beds" id="basics-select-beds"  class="form-control text-16 mt-2 ">
										@for($i=1;$i<=16;$i++)
											<option value="{{ $i }}" {{ ($i == $result->beds) ? 'selected' : '' }}>
											{{ ($i == '16') ? $i.'+' : $i }}
											</option>
										@endfor 
									</select>
								</div>

								<div class="form-group col-md-6 pl-5 pr-5">
									<label for="inputState">{{trans('messages.listing_basic.bathroom')}}</label>
									<select name="bathrooms" id="basics-select-bathrooms"  class="form-control text-16 mt-2">

										@for($i=0.5;$i<=8;$i+=0.5)
										<option class="bathrooms" value="{{ $i }}" {{ ($i == $result->bathrooms) ? 'selected' : '' }}>
										{{ ($i == '8') ? $i.'+' : $i }}
										</option>
										@endfor
									</select>
								</div>

								<div class="form-group col-md-6 pl-5 pr-5">
									<label for="inputState">{{trans('messages.listing_basic.bed_type')}}</label>


@php
$finalbed =  rtrim($result->bed_type, ',');
$counts = explode(',' ,$finalbed);
@endphp

<fieldset id="buildyourform">


<!-- @php
$ii=1;
$iii = 0;
while($ii <= count($counts)){
$idfield = "field".$ii;
$finalval = explode("-",$counts[$iii]);
@endphp

<div class="fieldwrapper" id="@php echo $idfield; @endphp">
	<input type="text" name="fieldname" class="fieldname@php echo $ii ; @endphp"  readonly="" value="@php echo $finalval[0]; @endphp">
	<input type="number" name="bednumer1" class="bednumer@php echo $ii ; @endphp" value="@php echo $finalval[1]; @endphp">
	<input type="button" class="remove" value="-">
</div>

@php 
$ii++;
$iii++;
}
@endphp -->
</fieldset>
	<select  name="bed_typess"   class="form-control text-16 mt-2 add" id="add"   >	<option value="0" disabled="" selected="">Add bed type</option>
										@foreach($bed_type as $key => $value)
										<option value="{{ $value }}" >{{ $value }}</option>
										@endforeach
									</select>


<div id="bedtypes">@php echo rtrim(str_replace("-"," ",$result->bed_type), ','); @endphp</div>
<input type="hidden" name="bed_type" id="bed_type" value="{{$result->bed_type}}">

<input type="hidden" name="lastid" id="lastid" class="lastid"  value="@php echo count($counts);  @endphp" >
		<div style="clear: both;height: 15px;"></div>						
<button type="button" class="btndone btn vbtn-outline-success text-16 font-weight-700 pl-4 pr-4 pt-3 pb-3" id="btndone" value="Edit">Edit</button>





								</div>
							</div>

							<div class="form-row mt-4 border rounded pb-4">
								<div class="form-group col-md-12 main-panelbg pb-3 pt-3">
									<h4 class="text-18 font-weight-700 pl-3">{{trans('messages.listing_basic.listing')}}</h4>
								</div>
							
								<div class="form-group col-md-6 pl-5 pr-5">
									<label for="inputState">{{trans('messages.listing_basic.property_type')}}</label>
									<select name="property_type"  class="form-control text-16 mt-2">
										@foreach($property_type as $key => $value)
										<option value="{{ $key }}" {{ ($key == $result->property_type) ? 'selected' : '' }}>{{ $value }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-md-6 pl-5 pr-5">
									<label for="inputState">{{trans('messages.listing_basic.room_type')}}</label>
									<select name="space_type" class="form-control text-16 mt-2">
										@foreach($space_type as $key => $value)
										<option value="{{ $key }}" {{ ($key == $result->space_type) ? 'selected' : '' }}>{{ $value }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-md-6 pl-5 pr-5">
									<label for="inputState">{{trans('messages.listing_basic.accommodate')}}</label>
									<select name="accommodates" id="basics-select-accommodates" class="form-control text-16 mt-2">
									@for($i=1;$i<=16;$i++)
										<option class="accommodates" value="{{ $i }}" {{ ($i == $result->accommodates) ? 'selected' : '' }}>
										{{ ($i == '16') ? $i.'+' : $i }}
										</option>
									@endfor
									</select>
								</div>
							</div>
							
							<div class="form-row float-right mt-5 mb-5">
								<div class="col-md-12 pr-0">
									<button type="submit" class="btn vbtn-outline-success text-16 font-weight-700 pl-4 pr-4 pt-3 pb-3" id="btn_next"><i class="spinner fa fa-spinner fa-spin d-none" ></i>
										<span id="btn_next-text">{{trans('messages.listing_basic.next')}}</span> 
									</button>
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
		$('#listing_bes').validate({
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
            }
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#buildyourform").hide();
		$("#add").hide();
		$("#bedtypes").show();
		var lastidfield=$("#lastid").val();

		if(lastidfield != 0){
			let ii = 1;
			let iii = 0;
			var results = $("#bed_type").val().split(',');
	
			while (ii <= lastidfield) {

							var bedname = 	results[iii];
							var bednamess = bedname.split('-');

							

							let fldname = ".fieldname" + ii;
							let bednumer = ".bednumer" + ii;
		



  if(bednamess[0]!=""){

					var lastField = $("#buildyourform div:last");
			        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
			        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + ii + "\"/>");
			        fieldWrapper.data("idx", intId);
			        var fName = $("<input type=\"text\" name=\"fieldname\" class=\"fieldname"  + ii + "\" value=" + bednamess[0] + " readonly/>");
			        var fType = $("<input type=\"number\" name=\"bednumer"  + ii +"\" class=\"bednumer"  + ii + "\" value="+ bednamess[1] +">");
			        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
			        removeButton.click(function() {
			            $(this).parent().remove();
			        });
			        // fieldWrapper.append(fName);
			        // fieldWrapper.append(fType);
			        // fieldWrapper.append(removeButton);
			      
			        	fieldWrapper.append(fName);
			        fieldWrapper.append(fType);
			        	$("#buildyourform").append(fieldWrapper);
			   
			        }
			        
			        $("#lastid").val(intId);
					$(".add option[value='"+ $(fldname).val() +"']").remove();
					ii++;
					iii++;
		}
		


		}







    $("#add").change(function() {

    	var bedtype =$("#add").val();
    	var lastidfields=$("#lastid").val();
    	$(".add option[value='"+ bedtype +"']").remove();
    	var lastField = $("#buildyourform div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<input type=\"text\" name=\"fieldname\" class=\"fieldname"  + intId + "\" value=" + bedtype + " readonly/>");
        var fType = $("<input type=\"number\" name=\"bednumer"  + intId +"\" class=\"bednumer"  + intId + "\" value=0>");
        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
   
        $("#lastid").val(intId);
    });
    

     $("#btndone").click(function() {
     			var lastidfield=$("#lastid").val();
     				let text = "";
     				let text2 = "";
					let i = 1;
        		if($("#btndone").val() == "Edit"){
        			$("#buildyourform").show();
        			$("#btndone").val("Done") ;
        			$("#btndone").html("Done") ;
        			$("#bedtypes").hide();
        			$("#add").show();
        		}else{
        			$("#buildyourform").hide();
        			$("#btndone").val("Edit") ;
        			$("#btndone").html("Edit") ;
					$("#bedtypes").show();
					$("#add").hide();
					while (i <= lastidfield) {
					let fldname = ".fieldname" + i;
					let bednumer = ".bednumer" + i;
					if($(bednumer).val() != 0){
							text += $(fldname).val() + "-" + $(bednumer).val()  + ",";
							text2 += $(fldname).val() + " " + $(bednumer).val()  + ",";
						}
					  
					  i++;
					}
					
					$("#bed_type").val(text) ;
					if(text2==""){
						text2 = "";
					}
					$("#bedtypes").html(text2) ;
        		}
        		
     });
});

</script>
@endpush
