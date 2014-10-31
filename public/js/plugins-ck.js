// Avoid `console` errors in browsers that lack a console.
function whichTransitionEvent(){var e,t=document.createElement("fakeelement"),n={transition:"transitionend",MSTransition:"msTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(e in n)if(t.style[e]!==undefined)return n[e]}(function(){var e,t=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeStamp","trace","warn"],r=n.length,i=window.console=window.console||{};while(r--){e=n[r];i[e]||(i[e]=t)}})();window.log=function(){log.history=log.history||[];log.history.push(arguments);if(this.console){var t=arguments,n;t.callee=t.callee.caller;n=[].slice.call(t);typeof console.log=="object"?log.apply.call(console.log,console,n):console.log.apply(console,n)}};(function(e){function t(){}for(var n="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),r;!!(r=n.pop());)e[r]=e[r]||t})(function(){try{console.log();return window.console}catch(e){return window.console={}}}());(function(e){function n(e){return typeof e=="object"?e:{top:e,left:e}}var t=e.scrollTo=function(t,n,r){e(window).scrollTo(t,n,r)};t.defaults={axis:"xy",duration:parseFloat(e.fn.jquery)>=1.3?0:1,limit:!0};t.window=function(t){return e(window)._scrollable()};e.fn._scrollable=function(){return this.map(function(){var t=this,n=!t.nodeName||e.inArray(t.nodeName.toLowerCase(),["iframe","#document","html","body"])!=-1;if(!n)return t;var r=(t.contentWindow||t).document||t.ownerDocument||t;return/webkit/i.test(navigator.userAgent)||r.compatMode=="BackCompat"?r.body:r.documentElement})};e.fn.scrollTo=function(r,i,s){if(typeof i=="object"){s=i;i=0}typeof s=="function"&&(s={onAfter:s});r=="max"&&(r=9e9);s=e.extend({},t.defaults,s);i=i||s.duration;s.queue=s.queue&&s.axis.length>1;s.queue&&(i/=2);s.offset=n(s.offset);s.over=n(s.over);return this._scrollable().each(function(){function d(e){u.animate(c,i,s.easing,e&&function(){e.call(this,a,s)})}if(r==null)return;var o=this,u=e(o),a=r,l,c={},p=u.is("html,body");switch(typeof a){case"number":case"string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(a)){a=n(a);break}a=e(a,this);if(!a.length)return;case"object":if(a.is||a.style)l=(a=e(a)).offset()}e.each(s.axis.split(""),function(e,n){var r=n=="x"?"Left":"Top",i=r.toLowerCase(),f="scroll"+r,v=o[f],m=t.max(o,n);if(l){c[f]=l[i]+(p?0:v-u.offset()[i]);if(s.margin){c[f]-=parseInt(a.css("margin"+r))||0;c[f]-=parseInt(a.css("border"+r+"Width"))||0}c[f]+=s.offset[i]||0;s.over[i]&&(c[f]+=a[n=="x"?"width":"height"]()*s.over[i])}else{var y=a[i];c[f]=y.slice&&y.slice(-1)=="%"?parseFloat(y)/100*m:y}s.limit&&/^\d+$/.test(c[f])&&(c[f]=c[f]<=0?0:Math.min(c[f],m));if(!e&&s.queue){v!=c[f]&&d(s.onAfterFirst);delete c[f]}});d(s.onAfter)}).end()};t.max=function(t,n){var r=n=="x"?"Width":"Height",i="scroll"+r;if(!e(t).is("html,body"))return t[i]-e(t)[r.toLowerCase()]();var s="client"+r,o=t.ownerDocument.documentElement,u=t.ownerDocument.body;return Math.max(o[i],u[i])-Math.min(o[s],u[s])}})(jQuery);(function(e){function r(t,n,r){var i=n.hash.slice(1),s=document.getElementById(i)||document.getElementsByName(i)[0];if(!s)return;t&&t.preventDefault();var o=e(r.target);if(r.lock&&o.is(":animated")||r.onBefore&&r.onBefore(t,s,o)===!1)return;r.stop&&o._scrollable().stop(!0);if(r.hash){var u=r.offset;u=u&&u.top||u||0;var a=s.id==i?"id":"name",f=e("<a> </a>").attr(a,i).css({position:"absolute",top:e(window).scrollTop()+u,left:e(window).scrollLeft()});s[a]="";e("body").prepend(f);location=n.hash;f.remove();s[a]=i}o.scrollTo(s,r).trigger("notify.serialScroll",[s])}var t=location.href.replace(/#.*/,""),n=e.localScroll=function(t){e("body").localScroll(t)};n.defaults={duration:350,axis:"y",event:"click",stop:!0,target:window};n.hash=function(t){if(location.hash){t=e.extend({},n.defaults,t);t.hash=!1;if(t.reset){var s=t.duration;delete t.duration;e(t.target).scrollTo(0,t);t.duration=s}r(0,location,t)}};e.fn.localScroll=function(s){function o(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,"")==t&&(!s.filter||e(this).is(s.filter))}s=e.extend({},n.defaults,s);return s.lazy?this.bind(s.event,function(t){var n=e([t.target,t.target.parentNode]).filter(o)[0];n&&r(t,n,s)}):this.find("a,area").filter(o).bind(s.event,function(e){r(e,this,s)}).end().end()}})(jQuery);(function(e,t){function n(i){var s=i||window.event,o=[].slice.call(arguments,1),u=0,f=0,l=0;return i=e.event.fix(s),i.type="mousewheel",s.wheelDelta&&(u=s.wheelDelta/120),s.detail&&(s.type==r[2]?(this.removeEventListener(r[0],n,!1),u=-s.detail/42):u=-s.detail/3),l=u,s.axis!==t&&s.axis===s.HORIZONTAL_AXIS&&(l=0,f=-1*u),s.wheelDeltaY!==t&&(l=s.wheelDeltaY/120),s.wheelDeltaX!==t&&(f=-1*s.wheelDeltaX/120),o.unshift(i,u,f,l),(e.event.dispatch||e.event.handle).apply(this,o)}var r=["DOMMouseScroll","mousewheel","MozMousePixelScroll"];if(e.event.fixHooks)for(var i=r.length;i;)e.event.fixHooks[r[--i]]=e.event.mouseHooks;e.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var e=r.length;e;)this.addEventListener(r[--e],n,!1);else this.onmousewheel=n},teardown:function(){if(this.removeEventListener)for(var e=r.length;e;)this.removeEventListener(r[--e],n,!1);else this.onmousewheel=null}}})(jQuery);