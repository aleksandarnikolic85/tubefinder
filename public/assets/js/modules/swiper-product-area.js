/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";function _extends(){return _extends=Object.assign||function(a){for(var b,c=1;c<arguments.length;c++)for(var d in b=arguments[c],b)Object.prototype.hasOwnProperty.call(b,d)&&(a[d]=b[d]);return a},_extends.apply(this,arguments)}function _classCallCheck(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}define(["swiperExtended","swiperUtils","responsiveHelper"],function(a,b,c){"use strict";var d=window.innerWidth,e={thumbs_slide:"{{id}} .swiper-container.-thumbs .swiper-wrapper .swiper-slide",thumbs_wrapper:"{{id}} .swiper-container.-thumbs .swiper-wrapper"},f={init:!1,grabCursor:!1,allowTouchMove:!1,spaceBetween:0,speed:750,navigation:{nextEl:null,prevEl:null},breakpointsInvers:!0,breakpoints:{768:{allowTouchMove:!0,pagination:{el:"{{id}} .swiper-pagination",clickable:!0}},992:{pagination:{el:null}}}},g={centeredSlides:!1,grabCursor:!1,init:!1,initialSlide:0,navigation:{nextEl:"{{id}} .swiper-button-next",prevEl:"{{id}} .swiper-button-prev"},slidesPerGroup:1,slidesPerView:"auto",spaceBetween:30,speed:250,watchSlidesVisibility:!0},h=function a(b){_classCallCheck(this,a),this.id=b.getAttribute("id"),this.node=b,this.options_thumbs=null,this.options_images=null,this.swiperThumbs=null,this.swiperImages=null,this.stage=null,this.timer=null};return h.prototype={constructor:h,init:function(){var a=this;c.registerHandler(),c.events.on("mq_change",function(){a.stage=this,a.initSwiper()}),c.getStage().then(function(b){a.stage=b,a.initSwiper(),window.addEventListener("resize",function(){d!==window.innerWidth&&(clearTimeout(a.timer),a.timer=setTimeout(function(){d=window.innerWidth,a.init(a.node)},100))})})},initSwiper:function(){var b=this;switch(null!==this.swiperThumbs&&this.swiperThumbs.swiper.destroy(!1,!0),null!==this.swiperImages&&this.swiperImages.swiper.destroy(!1,!0),(-1!=navigator.userAgent.indexOf("MSIE")||!0==!!document.documentMode)&&null==this.stage&&(this.stage="xl"),this.stage){case"xs":case"sm":this.swiperImages=new a(this.node.querySelector(".-images"),b.options_images);break;case"md":case"lg":case"xl":var c=document.querySelectorAll(".o-product-thumbs .swiper-slide").length;if(3<=c){this.swiperThumbs=new a(this.node.querySelector(".-thumbs"),b.options_thumbs),this.swiperImages=new a(this.node.querySelector(".-images"),_extends({thumbs:{swiper:this.swiperThumbs.swiper}},b.options_images));break}else{this.swiperThumbs=null,this.swiperImages=new a(this.node.querySelector(".-images"),b.options_images);break}}if(null!==this.swiperThumbs&&(this.swiperThumbs.swiper.snapGrid[this.swiperThumbs.swiper.snapGrid.length-1]+=20),null==this.swiperThumbs){document.querySelector(".o-product-thumbs .swiper-navigation").classList.add("_hide"),document.querySelector(".o-product-thumbs").classList.add("-is-not-initialized");var d=document.querySelectorAll(".o-product-thumbs .swiper-slide");d.forEach(function(a,c){a.addEventListener("click",function(c){d.forEach(function(a){a.classList.remove("swiper-slide-thumb-active")}),b.showSlide(a,c.currentTarget.dataset.index)}),0==c&&a.classList.add("swiper-slide-thumb-active")})}},setup:function(){var a=this;return new Promise(function(c){a.selectors=b.parseId(b.cloneObject(e),a.id),a.options_images=b.parseId(b.cloneObject(f),a.id),a.options_thumbs=b.parseId(b.cloneObject(g),a.id),c()})},showSlide:function(a,b){a.classList.add("swiper-slide-thumb-active"),this.swiperImages.swiper.slideTo(b)}},{init:function(a){var b=new h(a);b.setup().then(function(){b.init()})}}});