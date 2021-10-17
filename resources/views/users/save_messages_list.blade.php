<div class="row">
					<div class="col-md-6">Quick Replies</div>
					<div class="col-md-6"><button class="btn btn-xs btn-danger" onclick="msgmanage(this)" id="{{Auth::id()}}" style="float: right;">Manage</button></div>
					<div class="col-md-12">


		@foreach($savemgsss as $smessage)
			<p style="font-size: 14px;margin-bottom: 0!important">{{$smessage->title}}</p>
			<p style="font-size: 12px;margin-bottom: 0!important"><?php echo Str::limit($smessage->message, 140); ?></p>
			<button type="button" class="btn btn-warning" onclick="quickmsg(this)" data-dismiss="modal" id="{{$smessage->message}}">Use this reply</button> 
					<div style="clear: both;height: 10px"></div>
		@endforeach

					

		</div>
</div>	