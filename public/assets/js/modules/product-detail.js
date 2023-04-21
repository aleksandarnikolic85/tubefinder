/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";function _classCallCheck(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}define([],function(){var a={teaser:".m-teaser",slider:".o-product-slider",infix:".ajax-infix"},b={selected:"-is-selected"},c=function b(c){_classCallCheck(this,b),this.infix=document.querySelector(a.infix),this.productSlider=document.querySelector(a.slider),this.requestUri=c.querySelector("a").getAttribute("href"),this.productId=c.dataset.productId,this.addEvent(c),this.isReferredByProductId()};return c.prototype={constructor:c,addAnimation:function(){this.infix.classList.add("_fade-in"),this.infix.classList.remove("_transparent")},addEvent:function(a){var b=this;a.querySelector("a").addEventListener("click",function(c){c.preventDefault(),b.infix.classList.remove("_fade-in"),b.infix.classList.add("_transparent"),b.resetStateRepresentation(),b.requestProduct().then(function(c){b.refactorSvg(c),b.insertProduct(c),b.setStateRepresentation(a),b.addAnimation(),setTimeout(function(){b.infix.classList.remove("_fade-in")},1e3)})})},insertProduct:function(a){var b=this;this.infix.innerHTML="",a.querySelector("body").childNodes.forEach(function(a){b.infix.insertAdjacentElement("beforeEnd",a)}),moduleLoader.parse(this.infix)},isReferredByProductId:function(){var b=/productId=[a-zA-Z0-9_]+/ig,c=b.exec(location.search),d=this;if(null!==c){var e=c[0].split("=")[1];this.productSlider.querySelectorAll(a.teaser).forEach(function(a){a.dataset.productId==e&&d.setStateRepresentation(a)})}},parseResponse:function(a){var b=new DOMParser,c=b.parseFromString(a,"text/html");return c.documentElement},refactorSvg:function(a){var b=a.querySelectorAll("svg");b.forEach(function(a){var b=a.querySelector("use");if(null!==b){var c=document.createElementNS("http://www.w3.org/2000/svg","svg"),d=document.createElementNS("http://www.w3.org/2000/svg","use"),e=b.getAttribute("xlink:href");c.setAttributeNS("http://www.w3.org/2000/svg","preserveAspectRatio","xMaxYMin"),d.setAttributeNS("http://www.w3.org/1999/xlink","xlink:href",e),c.appendChild(d),a.parentNode.insertAdjacentElement("afterBegin",c),a.parentNode.removeChild(a)}})},requestProduct:function(){var a=this;return new Promise(function(b){var c=new XMLHttpRequest;c.addEventListener("load",function(){b(a.parseResponse(this.responseText))}),c.addEventListener("error",function(){console.log(this)}),c.open("GET",a.requestUri,!0),c.send()})},resetStateRepresentation:function(){this.productSlider.querySelectorAll(a.teaser).forEach(function(a){a.classList.remove(b.selected)})},setStateRepresentation:function(a){a.classList.add(b.selected)}},{init:function(a){new c(a)}}});