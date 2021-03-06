/**!
 * hoverIntent v1.8.0 // 2014.06.29 // jQuery v1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license. Basically that
 * means you are free to use hoverIntent as long as this header is left intact.
 * Copyright 2007, 2014 Brian Cherne
 */
;(function(a){a.fn.hoverIntent=function(m,d,h){var j={interval:100,sensitivity:6,timeout:0};if(typeof m==="object"){j=a.extend(j,m)}else{if(a.isFunction(d)){j=a.extend(j,{over:m,out:d,selector:h})}else{j=a.extend(j,{over:m,out:m,selector:d})}}var l,k,g,f;var e=function(n){l=n.pageX;k=n.pageY};var c=function(o,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);if(Math.sqrt((g-l)*(g-l)+(f-k)*(f-k))<j.sensitivity){a(n).off("mousemove.hoverIntent",e);n.hoverIntent_s=true;return j.over.apply(n,[o])}else{g=l;f=k;n.hoverIntent_t=setTimeout(function(){c(o,n)},j.interval)}};var i=function(o,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);n.hoverIntent_s=false;return j.out.apply(n,[o])};var b=function(p){var o=a.extend({},p);var n=this;if(n.hoverIntent_t){n.hoverIntent_t=clearTimeout(n.hoverIntent_t)}if(p.type==="mouseenter"){g=o.pageX;f=o.pageY;a(n).on("mousemove.hoverIntent",e);if(!n.hoverIntent_s){n.hoverIntent_t=setTimeout(function(){c(o,n)},j.interval)}}else{a(n).off("mousemove.hoverIntent",e);if(n.hoverIntent_s){n.hoverIntent_t=setTimeout(function(){i(o,n)},j.timeout)}}};return this.on({"mouseenter.hoverIntent":b,"mouseleave.hoverIntent":b},j.selector)}})(jQuery);
