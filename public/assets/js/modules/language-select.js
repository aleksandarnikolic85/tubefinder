/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";define(["buttonDropdownPrototype"],function(a){"use strict";var b=LANGUAGES;return{init:function(c){var d=c.querySelector(".m-button-dropdown"),e=new a;e.createOption=function(b){var c=document.createElement("li"),d=document.createElement("a"),a=document.createTextNode(b.title),e=document.createAttribute("href"),f=document.createAttribute("class");return e.value=b.href,d.setAttributeNode(e),d.appendChild(a),d.dataset.value=b.langcode,b.active&&(f.value="-is-active",d.setAttributeNode(f)),d.customEventType="option-select",d.addEventListener("click",this),c.appendChild(d),c},e.buildDropdownOptions=function(){var a=this;return new Promise(function(c){var d=document.createElement("ul");null!==a.dropdownSelect&&(b.forEach(function(b,c){d.appendChild(a.createOption(b,c))}),c(d))})},e.events.on("option-selected",function(){var a=this.toLowerCase();e.dropdownOptions.querySelectorAll("li").forEach(function(b){b.classList.remove("_hide"),b.querySelector("a").dataset.value.toLowerCase()==a&&b.classList.add("_hide")})}),e.onOptionSelect=function(){},e.init(d)}}});