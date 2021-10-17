


<h4 style="font-size: 18px">Save a message</h4>
  <div class="form-group">
  	<input type="hidden" id="msgid" value="@isset($savemsgrow->id) {{$savemsgrow->id}} @endisset">
    <label for="titleMsg" style="font-size: 14px">Title</label><br>
    <input type="text"  name="titleMsg" class="form-control" id="titleMsg" aria-describedby="Title" placeholder="Enter Title" value="@isset($savemsgrow->title) {{$savemsgrow->title}} @endisset">
  </div>

  <div class="form-group">
    <label for="msgsave"style="font-size: 14px">Message</label><br>
   <textarea name="msgsave" id="msgsave" class="form-control">@isset($savemsgrow->message) {{$savemsgrow->message}} @endisset</textarea>
  </div>


<div class="">
	<button class="btn btn-warning btn-savemessage"  style="float: left;">Save</button>
	<button class="btn btn-default btn-back-message" style="float: right;">Back to Save Messages</button>
</div>