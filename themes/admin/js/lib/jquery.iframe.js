/*
  Plugin: iframe autoheight jQuery Plugin
  Version: 1.9.3
  Description: when the page loads set the height of an iframe based on the height of its contents
  see README: http://github.com/house9/jquery-iframe-auto-height 
*/
!function(e){e.fn.iframeAutoHeight=function(t){function i(e){s.debug&&s.debug===!0&&window.console&&console.log(e)}function n(t,n){i("Diagnostics from '"+n+"'");try{i("  "+e(t,window.top.document).contents().find("body")[0].scrollHeight+" for ...find('body')[0].scrollHeight"),i("  "+e(t.contentWindow.document).height()+" for ...contentWindow.document).height()"),i("  "+e(t.contentWindow.document.body).height()+" for ...contentWindow.document.body).height()")}catch(r){i("  unable to check in this state")}i("End diagnostics -> results vary by browser and when diagnostics are requested")}var r;if(e.browser===r){var o=[];return o.push("WARNING: you appear to be using a newer version of jquery which does not support the $.browser variable."),o.push("The jQuery iframe auto height plugin relies heavly on the $.browser features."),o.push("Install jquery-browser: https://raw.github.com/house9/jquery-iframe-auto-height/master/release/jquery.browser.js"),alert(o.join("\n")),e}var s=e.extend({heightOffset:0,minHeight:0,callback:function(){},animate:!1,debug:!1,diagnostics:!1,resetToMinHeight:!1,triggerFunctions:[],heightCalculationOverrides:[]},t);return i(s),this.each(function(){function t(e){var t=null;return jQuery.each(o,function(i,n){return e[n]?(t=h[n],!1):void 0}),null===t&&(t=h["default"]),t}function r(r){s.diagnostics&&n(r,"resizeHeight"),s.resetToMinHeight&&s.resetToMinHeight===!0&&(r.style.height=s.minHeight+"px");var o=e(r,window.top.document).contents().find("body"),h=t(e.browser),a=h(r,o,s,e.browser);i(a),a<s.minHeight&&(i("new height is less than minHeight"),a=s.minHeight+s.heightOffset),i("New Height: "+a),s.animate?e(r).animate({height:a+"px"},{duration:500}):r.style.height=a+"px",s.callback.apply(e(r),[{newFrameHeight:a}])}var o=["webkit","mozilla","msie","opera"],h=[];h["default"]=function(e,t,i){return t[0].scrollHeight+i.heightOffset},jQuery.each(o,function(e,t){h[t]=h["default"]}),jQuery.each(s.heightCalculationOverrides,function(e,t){h[t.browser]=t.calculation});var a=0;if(i(this),s.diagnostics&&n(this,"each iframe"),s.triggerFunctions.length>0){i(s.triggerFunctions.length+" trigger Functions");for(var u=0;u<s.triggerFunctions.length;u++)s.triggerFunctions[u](r,this)}if(e.browser.webkit||e.browser.opera){i("browser is webkit or opera"),e(this).load(function(){var e=0,t=this,n=function(){r(t)};0===a?e=500:t.style.height=s.minHeight+"px",i("load delay: "+e),setTimeout(n,e),a++});var c=e(this).attr("src");e(this).attr("src",""),e(this).attr("src",c)}else e(this).load(function(){r(this)})})}}(jQuery);; 