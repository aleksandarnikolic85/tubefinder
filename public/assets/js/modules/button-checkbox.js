/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";define([],function(){"use strict";return{init:function(a){if(!a.hasAttribute("disabled")){var b=a.querySelector("label"),c=a.querySelector("input[type=\"checkbox\"]");a.addEventListener("click",function(){a.classList.toggle("-is-checked")}),a.addEventListener("mouseover",function(){c.checked||c.setAttribute("checked","checked")}),a.addEventListener("mouseout",function(){a.classList.contains("-is-checked")||c.removeAttribute("checked")}),b.addEventListener("click",function(a){a.preventDefault()})}}}});