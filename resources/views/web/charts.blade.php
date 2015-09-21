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
	<div id="count"></div>
	<div id="donut-chart1"></div>
	
	<script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

	<!--CDN links for the latest TweenLite, CSSPlugin, and EasePack-->
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

	<!--d3 and our wrapper classes-->
	<script src="//d3js.org/d3.v3.min.js"></script>
	<script src="js/svg/DonutChartBuilder.js"></script>
	<script src="js/svg/SVGHelper.js"></script>
	<script src="js/svg/LoadTransitions.js"></script>

</body>
<script type="text/javascript">
		
		$( document ).ready(function() {
			var a = new DonutChartBuilder('#donut-chart1',
						10,
						3,
						[1,1,1,1,1,1,1,1], 
						['#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FFFFFF'], 
						null, LoadTransitions.None);

			$( window ).resize(function() {
				a.updateDims();
			});

// 			a.transitionToValues (1, 80, null, null);
// 			a.transitionToValues (1, 80, [23,55,100], null);
			a.transitionToValues (1, 20, [1,2,3,4,5,6,7,8], ['#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FFFFFF']);
// 			a.transitionToValues (1, 80, null, ['#ccc', '#ddd', '#eee']);
// 			a.transitionToValues (1, null, null, ['#ccc', '#ddd', '#eee']);
// 			a.transitionToValues (1, null, [23,55,100], null);
			

			/*
			var params = [
				[1, 80, null, null],
				[1, 80, [23,55,100], null],
				[1, 80, [23,55,100], ['#ccc', '#ddd', '#eee']],
				[1, 80, null, ['#ccc', '#ddd', '#eee']],
				[1, null, null, ['#ccc', '#ddd', '#eee']],
				[1, null, [23,55,100], null]
			];
			
			var i=0;
			function nextFunc() {
				var param = params[i%params.length];
				a.transitionToValues.apply(null, param);
				i++;
			}
			*/
			
			
			
		});
	</script>
</html>