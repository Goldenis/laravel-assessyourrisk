$(document).ready(
		
		function() {
			var touchStartPos,
			heightBase = $('#height-base'),
			heightOverlay = $('#height-overlay'),
			topPos = 54,
			totalHeight = 1298,
			inc = 35,
			startPos = topPos - (inc * 14),
			slide = startPos,
			moved;
			var touch;
			
			
			TweenLite.to(heightBase, 1, {css:{top:startPos}, ease:Power3.easeOut});
			
			heightOverlay.mousedown (function(e) {
				console.log('heightOverlay.mousedown');
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
						endTrackingTouch();
					});
				}
			}
			
			function move(touch) {
				currentY = touch.pageY;
				moved = currentY - touchStartPos;
				slide += moved;
				slideH(heightBase, slide, .3);
				touchStartPos = currentY;
			}
			
			function endTrackingTouch() {
				$( window ).unbind();
			}
			
			function slideH(obj, degree, time) {
				TweenLite.killTweensOf(obj);
				TweenLite.to(obj, time, {css:{top:degree}, ease:Power3.easeOut});
				console.log(degree);
	        }
			
		});