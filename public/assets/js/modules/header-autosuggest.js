/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";define(["xhr"],function(a){"use strict";var b=function(a){return a.innerHTML=""},c=function(a,b){return"<li class='item' tabindex=\"0\"> ".concat(b.replace(a,"<span class='highlight'>"+a+"</span>")," </li>")};return{clear:b,init:function(d){var e=d.querySelector("input"),f=d.querySelector(".js-search-flyout-autosuggest"),g=d.dataset.autosuggestUrl,h=function d(){a.get("".concat(g,"?query=").concat(e.value)).then(function(a){var g=JSON.parse(a);if(0===g.length)return void b(f);var h=g.map(function(a){return c(e.value,a)}).join("");f.innerHTML="<ul class='results'> ".concat(h," </ul>"),f.querySelectorAll(".item").forEach(function(a){return a.addEventListener("click",function(){e.value=a.textContent.trim(),e.focus(),d()})})})};e.addEventListener("input",function(){2<e.value.length&&h()})}}});