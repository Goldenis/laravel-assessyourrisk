var weight = $(document).ready(
		function() {
			var touchStartPos,
			moved = 0, // amount your finger moved during touchmove
			weightBase = $('#weight-base'),
			weightOverlay = $('#weight-overlay'),
			rot = 0;
			var touch;
			window.weightInPounds = 0;
				
			weightOverlay.mousedown (function(e) {
				e.preventDefault();
				moved = 0;
				touch = e;
				touchStartPos = touch.pageX;
				startTrackingTouch(false);
			});
			
			weightOverlay.bind('touchstart', function(e) {
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
				rot += moved/2;
				if (rot > 0) {
					rot = 0;
				}
				rotate(weightBase, rot, 1);
				touchStartPos = currentX;
			}
			
			function endTrackingTouch() {
				$( window ).unbind('mousemove');
        $( window ).unbind('touchmove');
			}
			
			function rotate(obj, degree, time) {
				var degreeRot = (Math.abs(Math.ceil(degree))%720);
				window.weightInPounds = Math.ceil(240 * (degreeRot/360));
				TweenLite.killTweensOf(obj);
				TweenLite.to(obj, time, {css:{rotation:degree}, ease:Power3.easeOut});
	        }
			
		});