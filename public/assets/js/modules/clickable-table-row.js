/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";define([""],function(){"use strict";var a=this,b={LINK:".-is-clickable-row"},c={init:function(d){c.el=d;var e=d.querySelectorAll(b.LINK);e.forEach(function(a){a.innerText;a.addEventListener("click",function(b){b.preventDefault();var c=a.querySelector("a").getAttribute("href");c&&window.open(c)})},a)}};return c});