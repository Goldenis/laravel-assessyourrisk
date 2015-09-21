

//PNG Sequence Fire

/* Author: Nick Jones
*/
$(document).ready(function() {
	var win = $(window);
	var doc = $(document);
	var initialized = false;
	if(Modernizr.cssfilters){
		blurEnabled = true;
	}

	var WIN_H;
	var WIN_W;

  var frame = 0;

  var myL=0;
	var myW=0;
	//var loopInterval;
	//var looping = false;

	var sequenceScroll = 0;

	var events = {
		
		init: function(){
		
			// window.scrollTo(0, 1);
			
			win.bind('resize', pageResize);
			// win.bind('keydown',keyHandler);
			win.mouseup(function(){
				win.unbind('mousemove');
			});
			win.bind('mousewheel', function(eventData,deltaY) {
				//stopEasing();
				scrollHandler();
				//eventData.preventDefault();
			});

			pageResize();
			//startLoop();
			function pageResize (e) {
				WIN_H = win.height();
				WIN_W = win.width();
				initialized = true;
			}
			function scrollHandler(){
				frame = Math.floor(doc.scrollTop()/20);
				//console.log(frame);
						sequenceScrollSmoking = frame-190;
						$('#smoking-sequence').css({
							left:-sequenceScrollSmoking*(WIN_W-400)
						})
						sequenceScrollRunning = frame-240;
						$('#running-sequence').css({
							left:-sequenceScrollRunning*(WIN_W-400)
						})
					}
			}

		}
		//};
	events.init();
});







