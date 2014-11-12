$(document).ready(
		
		function() {
			var touchStartPos,
			heightBase = $('#height-base'),
			heightOverlay = $('#height-overlay'),
			topPos = 54,
			totalHeight = 1298,
			inc = 35,
			startPos = topPos - (inc * 14),
			bottomPos = topPos - (inc * 36),
			slide = startPos,
			moved;
			var touch;
			var spots = [];
			for (var i=0; i<36; i++) {
				spots.push(topPos - (inc * i));
			}
			
			TweenLite.to(heightBase, 1, {css:{top:startPos}, ease:Power3.easeOut});
			
			heightOverlay.mousedown (function(e) {
				e.preventDefault();
				moved = 0;
				touch = e;
				touchStartPos = touch.pageY;
				startTrackingTouch(false);
			});
			
			heightOverlay.bind('touchstart', function(e) {
				e.preventDefault();
				moved = 0;
				touch = e.originalEvent.touches[0]
					|| e.originalEvent.changedTouches[0];
				touchStartPos = touch.pageY;
				startTrackingTouch(true);
			});
			
			function startTrackingTouch(isTouch) {
				var currentY;
				
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
						//slide
						if (slide > topPos) {
							slide = topPos;
						} else if (slide < bottomPos) {
							slide = bottomPos;
						} else {
							slide = closestMatch(slide);
						}
						slideH(heightBase, slide, 1);
						endTrackingTouch();
					});
				}
			}
			
			function closestMatch(slide) {
				var goal = slide;
				var closest = spots.reduce(function (prev, curr) {
				  return (Math.abs(curr - goal) < Math.abs(prev - goal) ? curr : prev);
				});
				
				return closest;
			}
			
			function move(touch) {
				currentY = touch.pageY;
				moved = currentY - touchStartPos;
				slide += moved;
				slideH(heightBase, slide, 1);
				touchStartPos = currentY;
			}
			
			function endTrackingTouch() {
				$( window ).unbind();
			}
			
			function slideH(obj, degree, time) {
				TweenLite.killTweensOf(obj);
				TweenLite.to(obj, time, {css:{top:degree}, ease:Power3.easeOut});
	        }
			
		});