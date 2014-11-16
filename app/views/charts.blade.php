<?php


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>chart builder</title>
<link rel="stylesheet" href="css/chart-builder.css">
</head>
<body>
	
	<div id="donut-chart1"></div>

	<script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

	<!--CDN links for the latest TweenLite, CSSPlugin, and EasePack-->
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
<!-- 	<script -->
<!-- 		src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script> -->
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>	
	<script src="//d3js.org/d3.v3.min.js"></script>
	
	<script src="js/svg/DonutChartBuilder.js"></script>
	<script src="js/svg/SVGHelper.js"></script>
	<script src="js/svg/LoadTransitions.js"></script>
	
</body>
	<script type="text/javascript">
		
		$( document ).ready(function() {
			var a = new DonutChartBuilder('#donut-chart1',
						30,
						[100, 20, 30], 
						['#f00', '#0f0', '#00f'], 
						['10', '20', '30'], LoadTransitions.None);
			$( window ).resize(function() {
				a.updateDims();
			});
// 			a.transitionToValues (1, 80, [23,55,100], ['#ccc', '#ddd', '#eee']);
		});
	</script>
</html>