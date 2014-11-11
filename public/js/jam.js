$(document).ready(
		
		function() {
			var touchStartPos,
			moved = 0, // amount your finger moved during touchmove
			scaleBase = $('#scale-base'),
			rot = 0;
			var touch;
			
			$('.scale-container').mousedown (function(e) {
				e.preventDefault();
				moved = 0;
				touch = e;
				touchStartPos = touch.pageX;
				startTrackingTouch(false);
			});
			
			$('.scale-container').bind('touchstart', function(e) {
				e.preventDefault();
				moved = 0;
				touch = e.originalEvent.touches[0]
					|| e.originalEvent.changedTouches[0];
				touchStartPos = touch.pageX;
				startTrackingTouch(true);
			});
			
			function startTrackingTouch(isTouch) {
				var currentX;
				
				if (isTouch) {
					$(window).bind('touchmove', function(e) {
						e.preventDefault();
						touch = e.originalEvent.touches[0]
						|| e.originalEvent.changedTouches[0];
						currentX = touch.pageX;
						moved = currentX - touchStartPos;
						rot += moved/2;
						rotate(scaleBase, rot);
						touchStartPos = currentX;
					});
					
					$(window).bind('touchend', function(e) {
						e.preventDefault();
						endTrackingTouch();
					});
					
				} else {
					
					$(window).mousemove(function(e) {
						e.preventDefault();
						touch = e;
						currentX = touch.pageX;
						moved = currentX - touchStartPos;
						rot += moved/2;
						rotate(scaleBase, rot);
						touchStartPos = currentX;
					});
					
					$(window).mouseup(function(e) {
						e.preventDefault();
						endTrackingTouch();
					});
				}
			}
			
			function endTrackingTouch() {
				$( window ).unbind();
			}
			
			function rotate(obj, degree) {
				TweenLite.to('#scale-base', 1, {css:{rotation:degree}, ease:Power3.easeOut});
	        }
			
		});