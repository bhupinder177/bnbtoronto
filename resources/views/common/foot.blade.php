		
 <a href="#" class="scrollup">Scroll</a><style type="text/css">
	.scrollup {
 width: 60px;
 height: 60px;
 opacity: 0.3;
 position: fixed;
 bottom: 116px;
 right: 25px;
 display: none;
 text-indent: -9999px;
 z-index: 99999999999999999999999999999999;
 background: url('{{asset('public/front/img/top2.png')}}') no-repeat;
}
.footer-bg {
    background: #F8F8F8!important;
    color: #314E52;
}
.footer-bg a {
    color: #314E52;
}
footer#footer {
    border-radius: 15px;
}
.social li {
    display: block;
    margin: 5px!important;
    text-align: left!important;
}
</style>

		<!-- New Js start-->
		<script src="{{asset('public/js/jquery-2.2.4.min.js')}}"></script>
		       
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="http://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

		<script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('public/js/main.js')}}"></script>
		<!-- New Js End -->
		<!-- Needed Js from Old Version Start-->
		<script type="text/javascript">
			var APP_URL = "{{ url('/') }}";
			var USER_ID = "{{ isset(Auth::user()->id)  ? Auth::user()->id : ''  }}";
			var sessionDate      = '{!! Session::get('date_format_type') !!}';

		$(".currency_footer").on('click', function() {
			var currency = $(this).data('curr');
				$.ajax({
					type: "POST",
					url: APP_URL + "/set_session",
					data: {
						"_token": "{{ csrf_token() }}",
						'currency': currency
						},
					success: function(msg) {
						location.reload()
					},
			});
		});

		$(".language_footer").on('click', function() {
			var language = $(this).data('lang');
			$.ajax({
				type: "POST",
				url: APP_URL + "/set_session",
				data: {
						"_token": "{{ csrf_token() }}",
						'language': language
					},
				success: function(msg) {
					location.reload()
				},
			});
		});
		</script>


		<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}


</script>

<script>
 $(document).ready(function () {
     $(window).scroll(function () {
         if ($(this).scrollTop() > 300) {
             $('.scrollup').fadeIn();
         } else {
             $('.scrollup').fadeOut();
         }
     });
     $('.scrollup').click(function () {
         $("html, body").animate({
             scrollTop: 0
         }, 600);
         return false;
     });
 });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60d03c6c65b7290ac63702f0/1f8mmo2h4';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
		<!-- Needed Js from Old Version End -->
		@stack('scripts')
	</body>
</html>