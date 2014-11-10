$(document).ready(
		
		function() {

			// Touch events
			var touchStartPos,
			moved = 0, // amount your finger moved during touchmove
			isTouchDevice = false, // set to true on touchstart
			scaleBase = $('#scale-base'),
			rot = 0;

			$('.scale-container').bind('touchstart, mousedown', function(e) {
				console.log(e.type);
				e.preventDefault();
				// isTouchDevice = true;
				moved = 0;
				var touch;
				if (e.type == 'mousedown') {
					touch = e;
				} else {
					touch = e.originalEvent.touches[0]
					|| e.originalEvent.changedTouches[0];
				}
				touchStartPos = touch.pageX;
				startTrackingTouch();
			})
			
			function startTrackingTouch() {
				$('body').bind('touchmove, mousemove', function(e) {
					e.preventDefault();
					var touch;
					if (e.type == 'mousemove') {
						touch = e;
					} else {
						touch = e.originalEvent.touches[0]
						|| e.originalEvent.changedTouches[0];
					}
					var currentX = touch.pageX;
					moved = currentX - touchStartPos;
					rot += moved/2;
					rotate(scaleBase, rot);
					touchStartPos = currentX;
				});
				$(window).bind('touchend, mouseup', function(e) {
					e.preventDefault();
					var touch;
					if (e.type == 'mouseup') {
						touch = e;
					} else {
						touch = e.originalEvent.touches[0]
						|| e.originalEvent.changedTouches[0];
					}
//					console.log(moved);
					endTrackingTouch();
				})
			}
			
			function endTrackingTouch() {
				$( "body" ).unbind();
				$( window ).unbind();
			}
			
			function rotate(obj, degree) {
				TweenLite.to('#scale-base', 1, {css:{rotation:degree}, ease:Power3.easeOut});
	        }
			
		});