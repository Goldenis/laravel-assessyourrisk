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
						50,
						0,
						[0, 1], 
						['#f00', '#0f0'], 
						null, LoadTransitions.None);

			$( window ).resize(function() {
				a.updateDims();
			});

// 			var aa = a.transitionToValues (1, 80, null, null);
// 			var bb = a.transitionToValues (1, 80, [23,55,100], null);
// 			var cc = a.transitionToValues (1, 80, [23,55,100], ['#ccc', '#ddd', '#eee']);
// 			var dd = a.transitionToValues (1, 80, null, ['#ccc', '#ddd', '#eee']);
// 			var ee = a.transitionToValues (1, null, null, ['#ccc', '#ddd', '#eee']);
// 			var ff = a.transitionToValues (1, null, [23,55,100], null);
			
			//https://reserve.thegrid.io/serial/f6a4bd8d-55ec-4c3a-9ccd-9c5f3df80802/latest
			
			function getSessionResults() {
		      resp = $.ajax({
		        type : "GET",
		        cache: false,
		        url : "http://reserve.thegrid.io/serial/f6a4bd8d-55ec-4c3a-9ccd-9c5f3df80802/latest",
		      }).done(function(data) {
		        console.log(parseInt(data));
		    	  a.transitionToValues (5, 50, [10000 - (parseInt(data) + 1), 10], ['#f00', '#0f0']);
		    	  $('#count').html('<b>' + (parseInt(data) + 1) + '</b>');
		      }).fail(function(data) {
		        console.log(data);
		      });
		    }
			
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
			setInterval (getSessionResults, 5000);
			
			
			
		});
	</script>
</html>