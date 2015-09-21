<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BMI</title>
<style>

body {
	margin: 0;
}

.weight-container {
	width: 590px;
	height: 590px;
	left: -130px;
	top: 0px;
	position: absolute;
    -webkit-mask: url(/img/assessment/scales/weight_mask.png) no-repeat;
    -webkit-mask-position: 0px 0px;
    overflow: hidden;
}

#weight-base {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-repeat:no-repeat;
    background-image: url(img/assessment/scales/weight_base.png);
}

#weight-overlay {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-repeat:no-repeat;
    background-image: url(img/assessment/scales/weight_overlay.png);
    z-index: 1000;
}


.height-container {
	width: 146px;
	height: 1298px;
	left: 350px;
	top: 20px;
	position: absolute;
    -webkit-mask: url(/img/assessment/scales/height_mask.png) no-repeat;
    -webkit-mask-position: 0px 0px;
    overflow: hidden;
}

#height-base {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-repeat:no-repeat;
    background-image: url(img/assessment/scales/height_base.png);
}

#height-overlay {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-repeat:no-repeat;
    background-image: url(img/assessment/scales/height_overlay.png);
    z-index: 1001;
}


</style>
</head>
<body>
	<div class="weight-container">
		<div id="weight-base"></div>
		<div id="weight-overlay"></div>
	</div>
	<div class="height-container">
		<div id="height-base"></div>
		<div id="height-overlay"></div>
	</div>
	
	<div>
		
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

	<script src="js/weight.js"></script>
	<script src="js/height.js"></script>

</body>
</html>
