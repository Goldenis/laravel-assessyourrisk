$(document).ready(
		
		function() {

			// Touch events
			var touchStartPos;
			var allCards = $('div[class^="card-"]');
			moved = 0, // amount your finger moved during touchmove
			isTouchDevice = false; // set to true on touchstart

			$(window).bind(
					'touchstart',
					function(e) {
						e.preventDefault();
						// isTouchDevice = true;
						clearInterval(touchInterval);
						moved = 0;
						var touch = e.originalEvent.touches[0]
								|| e.originalEvent.changedTouches[0];
						touchStartPos = touch.pageY;
					})
			$('body').bind(
					'touchmove',
					function(e) {
						e.preventDefault();
						var touch = e.originalEvent.touches[0]
								|| e.originalEvent.changedTouches[0];
						var currentY = touch.pageY;
						moved = currentY - touchStartPos;
						touchStartPos = currentY;
					});

			$(window).bind(
					'touchend',
					function(e) {
						e.preventDefault();
						var touch = e.originalEvent.touches[0]
								|| e.originalEvent.changedTouches[0];
					})
		});