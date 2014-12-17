var wheel = $(document).ready(
		function() {
			/*
			 * SET doAllowDrag to false to disable the mouse spin
			 */
			var doAllowDrag = true;
			var touchStartPos,
			moved = 0, // amount your finger moved during touchmove
			wheelBase = $('#wheel-base'),
			rot = 0;
			var touch;
			
			var main_chart_div = d3.select("#wheel-overlay").append("div");
			var svg;
			d3.xml("img/roulette/Roulette_spencer_newcopy_outlines.svg", function(error,
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
				doSetHighlighted(ids[pos]);
			}
			
			function doSetHighlighted(segmentId) {
				// #you
				// #g-you
				
				svg.selectAll('#copy  path').style('fill', "#D8076D")
				svg.selectAll('#segments path').style('fill', "none")
				
				svg.selectAll('#t-' + segmentId + ' path').style('fill', "#fff")
				svg.selectAll('#g-' + segmentId + ' path').style('fill', "#D8076D")
			}
			
			if (doAllowDrag) {
				wheelBase.mousedown (function(e) {
					e.preventDefault();
					moved = 0;
					touch = e;
					touchStartPos = touch.pageX;
					startTrackingTouch(false);
				});
				
				wheelBase.bind('touchstart', function(e) {
					e.preventDefault();
					moved = 0;
					touch = e.originalEvent.touches[0]
						|| e.originalEvent.changedTouches[0];
					touchStartPos = touch.pageX;
					startTrackingTouch(true);
				});
			}
			
			
			function startTrackingTouch(isTouch) {
								
				var currentX;
				
				if (isTouch) {
					$(window).bind('touchmove', function(e) {
						e.preventDefault();
						touch = e.originalEvent.touches[0]
						|| e.originalEvent.changedTouches[0];
						move(touch);
					});
					
					$(window).bind('touchend', function(e) {
						e.preventDefault();
						endTrackingTouch();
					});
					
				} else {
					
					$(window).mousemove(function(e) {
						e.preventDefault();
						touch = e;
						move(touch);
					});
					
					$(window).mouseup(function(e) {
						e.preventDefault();
						endTrackingTouch();
					});
				}
			}
			
			
			function move(touch) {
				currentX = touch.pageX;
				moved = currentX - touchStartPos;
				rot += moved * 10;
				rotate(wheelBase, rot, 10);
//				rot += moved*2;
//				rotate(wheelBase, rot, 1);
				touchStartPos = currentX;
			}
				
			function endTrackingTouch() {
								
				$( window ).unbind('touchmove');
				$( window ).unbind('touchend');
				$( window ).unbind('mousemove');
				$( window ).unbind('mouseup');
			}
			
			function rotate(obj, degree, time) {
				TweenLite.killTweensOf(obj);
				TweenLite.to(obj, time, {css:{rotation:degree}, ease:Power3.easeOut, onUpdate:applyValue, onUpdateParams:[degree]});
	        }

			function applyValue(degree) {
				highlightByRotation()
			}
			
		});