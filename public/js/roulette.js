var wheel = $(document).ready(
		function() {
			/*
			 * SET doAllowDrag to false to disable the mouse spin
			 */
			var doAllowDrag = false;
			var doSpinUponLoad = true;
			var touchStartPos,
			touchMove,
			touchEnd,
			moved = 0, // amount your finger moved during touchmove
			wheelBase = $('#wheel-base'),
			rot = 0;
			var touch;
			
			var main_chart_div = d3.select("#wheel-overlay").append("div");
			var svg;
			d3.xml("img/roulette/roulette.svg", function(error,
					documentFragment) {
				if (error) {
					console.log(error);
					return;
				}
				var svgNode = documentFragment.getElementsByTagName("svg")[0];
				main_chart_div.node().appendChild(svgNode);
				svg = main_chart_div.select("svg")
				doSetHighlighted('you')
			})
			
			var locations = [348, 8, 54, 94, 142, 166, 220, 288, 347];
			var ids = ['you', 'sister', 'aunt', 'girl', 'mom', 'maid', 'friend', 'partner'];
			
			var last = -1;
			function highlightByRotation() {
				var r1 = wheelBase[0]._gsTransform.rotation % 360;
				var pos = 0;
				for (var i=0; i<locations.length; i++) {
					var l1 = (locations[i]);
					var l2 = (locations[(i+1) % locations.length]);
					if (r1 >= l1 && r1 <= l2) {
						pos = i;
						break;
					}
				}
				if (last != pos) {
					doSetHighlighted(ids[pos]);
					last = pos;
				}
				
				
			}
			var tog = 0
			function doSetHighlighted(segmentId) {
				// #you
				// #g-you
				
				svg.selectAll('#copy path').style('fill', "#D8076D")
				svg.selectAll('#segments path').style('fill', "none")
				
				svg.selectAll('#t-' + segmentId + ' path').style('fill', "#fff")
				svg.select('#g-' + segmentId + ' path').style('fill', "#D8076D")
				
				var bit = tog++ % 2
				svg.select('#breast path').style('fill', bit ? "#fff" : "#D8076D")
				svg.select('#ovarian path').style('fill', !bit ? "#fff" : "#D8076D")
				svg.selectAll('#breast g g path').style('fill', !bit ? "#fff" : "#D8076D")
				svg.selectAll('#ovarian g g path').style('fill', bit ? "#fff" : "#D8076D")
			}
			
			// if (doAllowDrag) {
			// 	wheelBase.mousedown (function(e) {
			// 		e.preventDefault();
			// 		moved = 0;
			// 		touch = e;
			// 		touchStartPos = touch.pageX;
			// 		// startTrackingTouch(false);
			// 	});
				
			// 	wheelBase.bind('touchstart', function(e) {
			// 		e.preventDefault();
			// 		moved = 0;
			// 		touch = e.originalEvent.touches[0]
			// 			|| e.originalEvent.changedTouches[0];
			// 		touchStartPos = touch.pageX;
			// 		// startTrackingTouch(true);
			// 	});
			// }
			
			
			// function startTrackingTouch(isTouch) {
								
			// 	var currentX;
				
			// 	if (isTouch) {
			// 		var touchmove = $(window).bind('touchmove', function(e) {
			// 			e.preventDefault();
			// 			touch = e.originalEvent.touches[0]
			// 			|| e.originalEvent.changedTouches[0];
			// 			move(touch);
			// 		});
					
			// 		var touchend = $(window).bind('touchend', function(e) {
			// 			e.preventDefault();
			// 			endTrackingTouch();
			// 		});
					
			// 	} else {
					
			// 		$(window).mousemove(function(e) {
			// 			e.preventDefault();
			// 			touch = e;
			// 			move(touch);
			// 		});
					
			// 		$(window).mouseup(function(e) {
			// 			e.preventDefault();
			// 			endTrackingTouch();
			// 		});
			// 	}
			// }
			
			
// 			function move(touch) {
// 				currentX = touch.pageX;
// 				moved = currentX - touchStartPos;
// 				rot += moved * 10;
// 				rotate(wheelBase, rot, 6);
// //				rot += moved*2;
// //				rotate(wheelBase, rot, 1);
// 				touchStartPos = currentX;
// 			}
				
			function endTrackingTouch() {
								
				$(window).unbind(touchMove);
				$(window).unbind(touchEnd);
				$( window ).unbind('mousemove');
				$( window ).unbind('mouseup');
			}
			
			function rotate(obj, degree, time) {
				TweenLite.killTweensOf(obj);
				TweenLite.to(obj, time, {css:{rotation:degree}, ease:Expo.easeOut, onUpdate:applyValue, onUpdateParams:[degree]});
	        }
				
			function applyValue(degree) {
				highlightByRotation()
			}
			
			function spinOnLoad() {
				$('#wheel-overlay').addClass('turn');
				rotate(wheelBase, Math.random() * 500 + 1000, 5);
        $('.spin').css({display: "none"})
			}
			
			if (doSpinUponLoad) {
				setTimeout(spinOnLoad, 2000);
			}
		});