/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";define(["docCookies"],function(a){"use strict";var b="cookie-set",c={addEvents:function(){var a=c.scope;a.linkExpand.addEventListener("click",function(){c.toggleDisplay([a.textExpanded,a.textClipped])}),a.linkClip.addEventListener("click",function(){c.toggleDisplay([a.textExpanded,a.textClipped])}),a.button.addEventListener("click",function(){c.setCookie(),c.toggleDisplay(a.el),document.body.classList.add(b),VisitorSettings.acceptCookiePolicy(),VisitorSettings.acceptAnalytics()})},domScope:function(a){return new Promise(function(b){c.scope={el:a,linkExpand:a.querySelector("#cookie-message-expand"),textExpanded:a.querySelector(".-expanded"),linkClip:a.querySelector("#cookie-message-clip"),textClipped:a.querySelector(".-clipped"),button:a.querySelector(".a-button")},b()})},getCookie:function(){var b=a.getItem("ldv_cookieAccepted");return b},isStickySupported:function(){for(var a=["","-o-","-webkit-","-moz-","-ms-"],b=document.head.style,c=0;c<a.length;c+=1)b.position=a[c]+"sticky";var d=!!b.position&&b.position;return b.position="",d},isBrowserEdge:function(){return"undefined"!=typeof CSS&&CSS.supports("(-ms-ime-align:auto)")},polyfillSticky:function(a){var b=c.isStickySupported();if(b&&!c.isBrowserEdge())return a.style.position=b,void(a.style.top=0);var d=function(a){var b=a.nextElementSibling.getBoundingClientRect(),c=a.getBoundingClientRect();"fixed"===a.style.position?b.top+c.height<=document.documentElement.clientHeight&&(a.style.position="static"):b.top>document.documentElement.clientHeight&&(a.style.position="fixed")};d(a),window.addEventListener("scroll",function(){return d(a)})},init:function(a){var d=document.querySelector(".o-footer");null==c.getCookie()?c.domScope(a).then(function(){c.toggleDisplay(a),c.addEvents(),d?c.polyfillSticky(a):(a.style.position="fixed",a.style.bottom="0",a.style.top="")}):document.body.classList.add(b)},setCookie:function(){a.setItem("ldv_cookieAccepted",!0,"Infinity","/",null,null)},toggleDisplay:function(a){Array.isArray(a)?a.forEach(function(a){a.classList.toggle("_hide")}):a.classList.toggle("_hide")}};return c});