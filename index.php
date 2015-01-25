<!DOCTYPE html>
<html>
	<head>
		<script src="jquery.js"></script>
	</head>
	<body>
		<h1 id="status">???</h1>
		<script>
			var last="";
			$(function(){
				var audioElement = document.createElement('audio');
				audioElement.addEventListener("load", function() {
					audioElement.play();
				}, true);
				if ( typeof(handler)=="undefined")
					var handler=setInterval(function(){
						$.getJSON("http://www.tansah.com/asset/online.php?callback=?", function(res){
							if (last!="on"){
								audioElement.setAttribute('src', 'on.mp3');
								$("#status").html("ON");
								audioElement.play();
								last="on";
							}
						}).fail(function() {
							if (last!="off"){
								audioElement.setAttribute('src', 'off.mp3');
								$("#status").html("OFF");
								audioElement.play();
								last="off";
							}
						});
					}, 10000);
			});
		</script>
	</body>
</html>