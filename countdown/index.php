<html>
<head>
<?php include '../global/head.php'; ?>
<style>

#countdown{
	text-align:center;
}

.countdown-box{
	display: inline-block;
}

.countdown-box p{
	font-size: 6vw;
	line-height:6vw;
	padding:5px;
	font-weight: bold;
	margin:0;
	background: #be0071;
	color: #fff;
}

.countdown-box span{
	display: block;
	font-size: 1vw;
	line-height:1vw;
	background: #dedede;
	padding:5px;
}





</style>
<script>
(function($){
	
	$(document).ready(function(){
		
		var endDate = new Date("Jan 1, 2020 00:00:01").getTime();
			
		
		
		var x = setInterval(function(){
			
			var now = new Date().getTime(),
				distance = endDate - now,
				days = Math.floor(distance / (1000 * 60 * 60 * 24)),
				hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
				minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
				seconds = Math.floor((distance % (1000 * 60)) / 1000);
				
			$(".days").text(days);
			$(".hours").text(hours);
			$(".minutes").text(minutes);
			$(".seconds").text(seconds);
			
			if(distance < 0){
				clearInterval(x);
				$("#countdown").text("EXPIRED")
				
			}
			
		}, 1000);
		
		
		
		
		
	});
	
})(jQuery);
</script>

</head>
<body>
	
		<div id="countdown">
			<div class="countdown-box"><p class="days"></p><span>days</span></div>
			<div class="countdown-box"><p class="hours"></p><span>hours</span></div>
			<div class="countdown-box"><p class="minutes"></p><span>minutes</span></div>
			<div class="countdown-box"><p class="seconds"></p><span>seconds</span></div>
		</div>
	
    </body>
</html>