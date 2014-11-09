<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BMI</title>
<style>

body {
	margin: 0;
}

.scale-container {
	width: 590px;
	height: 590px;
	position: relative;
    -webkit-mask: url(/img/assessment/scale/scale_mask.png) no-repeat;
    -webkit-mask-position: 0px 0px;
    
    
    -webkit-mask-image: url(img/assessment/scale/scale_mask.png);
	-o-mask-image: url(img/assessment/scale/scale_mask.png);
	-moz-mask-image: url(img/assessment/scale/scale_mask.png);
	mask-image: url(img/assessment/scale/scale_mask.png);
    
    overflow: hidden;
}

#scale-base {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-repeat:no-repeat;
    background-image: url(img/assessment/scale/scale_base.png);
}

#scale-overlay {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-repeat:no-repeat;
    background-image: url(img/assessment/scale/scale_overlay.png);
}

</style>
</head>
<body>



	<div class="scale-container">
		<div id="scale-base"></div>
		<div id="scale-overlay"></div>
	</div>

	<script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

	<!--CDN links for the latest TweenLite, CSSPlugin, and EasePack-->
	<script
		src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
	<script
		src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
	<script
		src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>


	<script src="js/jam.js"></script>

</body>
</html>
