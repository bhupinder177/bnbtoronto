<header>
	Choose a message to Edit
</header>

	<div class="row">
		
		@foreach($savemgs as $smessage)

<div style="border: 1px solid black;padding:20px;margin-bottom:20px;width: 100%">

			<a  onclick="editsavemsg(this)" id="{{$smessage->id}}" >
				<p class="m-0" style="font-size:14px;">{{$smessage->title}}</p>
				<p class="m-0" style="font-size:12px;"><?php echo Str::limit($smessage->message, 140); ?></p>
			</a>
		</div>
		
<div style="clear: both;height: 5px;display: block"></div>
		@endforeach


	</div>
	<div style="clear: both;height: 25px;display: block"></div>
	<hr>
	<div style="clear: both;height: 15px;display: block"></div>
<div class="">
	<button class="btn btn-warning btn-new-message" onclick="editsavemsg(this)"  id="0000" style="float: left;">Save a new message</button>
	<button class="btn btn-default btn-back-message" style="float: right;">Back to Save Messages</button>
</div>