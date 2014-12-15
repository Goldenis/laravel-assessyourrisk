<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Roulette</title>
<style>

body {
	margin: 0;
}

.wheel-container {
	width: 400px;
	height: 400px;
	left: 0px;
	top: 0px;
	position: absolute;
    overflow: hidden;
}

#wheel-base {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-repeat:no-repeat;
    background-image: url(img/roulette/spin_base.png);
}

#wheel-overlay {
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    pointer-events:none;
}

</style>
</head>
<body>
	<div class="wheel-container">
		<div id="wheel-base"></div>
		<div id="wheel-overlay"></div>
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
		src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
	<script src="//d3js.org/d3.v3.min.js"></script>
	<script src="js/svg/SVGHelper.js"></script>
	<script src="js/roulette.js"></script>

</body>
</html>
