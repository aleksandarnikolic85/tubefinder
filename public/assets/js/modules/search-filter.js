/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";function _toConsumableArray(a){return _arrayWithoutHoles(a)||_iterableToArray(a)||_nonIterableSpread()}function _nonIterableSpread(){throw new TypeError("Invalid attempt to spread non-iterable instance")}function _iterableToArray(a){if(Symbol.iterator in Object(a)||"[object Arguments]"===Object.prototype.toString.call(a))return Array.from(a)}function _arrayWithoutHoles(a){if(Array.isArray(a)){for(var b=0,c=Array(a.length);b<a.length;b++)c[b]=a[b];return c}}define(["form","input"],function(a,b){"use strict";return{init:function(c){function d(){setTimeout(function(){var a=_toConsumableArray(c.querySelectorAll(".".concat(b.OPTIONS.states.dirty.class))).length;e.innerHTML=0<a?a:"",a?f.removeAttribute("disabled"):f.setAttribute("disabled","")},150)}var e=c.querySelector(".dropdown-control > .count"),f=c.querySelector("[type=\"reset\"]");a.Form(c),c.addEventListener("change",d),c.addEventListener(b.OPTIONS.events.dirtied,d),f.addEventListener("click",d)}}});