/*! ledvance-2019 1.3.1-84 08-06-2020 16:24:56 */
"use strict";

function _classCallCheck(a, b) {
    if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function")
}

function _extends() {
    return _extends = Object.assign || function (a) {
        for (var b, c = 1; c < arguments.length; c++) for (var d in b = arguments[c], b) Object.prototype.hasOwnProperty.call(b, d) && (a[d] = b[d]);
        return a
    }, _extends.apply(this, arguments)
}

define(["swiperExtended", "swiperUtils", "responsiveHelper"], function (a, b, c) {
    "use strict";
    var d = window.innerWidth, e = {
        thumbs_slide: "{{id}} .swiper-container.-thumbs .swiper-wrapper .swiper-slide",
        thumbs_wrapper: "{{id}} .swiper-container.-thumbs .swiper-wrapper"
    }, f = {
        breakpointsInverse: !0,
        breakpoints: {
            768: {pagination: {el: null}},
            1200: {
                spaceBetween: 30,
                navigation: {nextEl: "{{id}} .swiper-button-next", prevEl: "{{id}} .swiper-button-prev"}
            }
        },
        customParams: {
            accordionContainer: "{{id}} .accordion-container",
            accordionWrapper: "{{id}} .accordion-wrapper"
        },
        grabCursor: !0,
        simulateTouch: 0,
        init: !1,
        navigation: {nextEl: null, prevEl: null},
        pagination: {el: "{{id}} .swiper-pagination", clickable: !0},
        spaceBetween: 0,
        speed: 750,
        on: {
            init: function () {
                this.switchAccordion(this.activeIndex)
            }, slideChange: function () {
                var a = this;
                setTimeout(function () {
                    var b = a.thumbs.swiper.el.querySelector(".swiper-slide-thumb-active"),
                        c = parseInt(window.getComputedStyle(b).width.replace(/px/, "")), d = b.getBoundingClientRect(),
                        e = window.innerWidth;
                    d.right > e - 2 * c && a.thumbs.swiper.slideNext(), d.left < 0 + 2 * c && a.thumbs.swiper.slidePrev()
                }, 100), this.switchAccordion(this.activeIndex)
            }
        }
    }, g = {
        breakpointsInverse: !0,
        breakpoints: {768: {}, 1200: {}},
        init: !1,
        centeredSlides: !1,
        freeMode: !0,
        freeModeSticky: !0,
        grabCursor: !0,
        initialSlide: 0,
        observer: !0,
        observeSlideChildren: !0,
        on: {
            init: function () {
                -1 !== ["768", "1200"].indexOf(this.currentBreakpoint) && this.mutateSlides(), this.show()
            }, resize: function () {
                d !== window.innerWidth && this.hide()
            }
        },
        slidesPerGroup: 1,
        slidesPerView: "auto",
        spaceBetween: 20,
        speed: 250,
        watchSlidesVisibility: !0,
        watchSlidesProgress: !0
    }, h = {
        invokeOnInit: [{key: "spaceBetween", method: "getMargin", breakpoint: 768}, {
            key: "slidesOffsetBefore",
            method: "getOffsetBefore",
            breakpoint: 768
        }],
        hiddenContainer: "{{id}} .swiper-hidden-container",
        hiddenColumn: "{{id}} .swiper-hidden-container .row [class^=\"col-\"]",
        swiperSlide: "{{id}} .swiper-slide",
        swiperInnerSlide: "{{id}} .swiper-slide-inner"
    }, i = {
        hiddenContainer: "{{id}} .swiper-hidden-container",
        hiddenColumn: "{{id}} .swiper-hidden-container .row [class^=\"col-\"]",
        swiperSlide: "{{id}} .swiper-slide",
        swiperInnerSlide: "{{id}} .swiper-slide-inner"
    }, j = function (a, c) {
        var d = b.parseId(b.cloneObject(g), a), e = b.parseId(b.cloneObject(i), a), f = b.parseId(b.cloneObject(h), a),
            j = -1 === ["md", "lg", "xl"].indexOf(c) ? e : f;
        return _extends({customParams: j}, d)
    }, k = function a(b, c) {
        _classCallCheck(this, a), this.id = b.getAttribute("id"), this.node = b, this.options_thumbs = null, this.options_images = null, this.swiperThumbs = null, this.swiperImages = null, this.stage = c, this.timer = null
    };
    return k.prototype = {
        constructor: k, init: function () {
            var b = this;
            c.getStage().then(function (c) {
                b.stage = c, -1 !== ["md", "lg", "xl"].indexOf(b.stage) && (b.swiperThumbs = new a(b.node.querySelector(".-thumbs"), b.options_thumbs), b.options_images = _extends({thumbs: {swiper: b.swiperThumbs.swiper}}, b.options_images)), b.swiperImages = new a(b.node.querySelector(".-images"), b.options_images)
            }), window.addEventListener("resize", function () {
                d !== window.innerWidth && (clearTimeout(b.timer), b.timer = setTimeout(function () {
                    d = window.innerWidth, b.init()
                }, 100))
            })
        }, setCentered: function () {
            var a = this.selectors.thumbs_wrapper, b = document.querySelectorAll(this.selectors.thumbs_slide).length;
            document.querySelector(a).classList.remove("-is-centered"), 6 >= b ? document.querySelector(a).classList.add("-is-centered") : 8 >= b && -1 !== ["xl"].indexOf(this.stage) && document.querySelector(a).classList.add("-is-centered")
        }, setup: function () {
            var a = this;
            return new Promise(function (c) {
                a.selectors = b.parseId(b.cloneObject(e), a.id), a.options_thumbs = b.parseId(j(a.id, a.stage), a.id), a.options_images = b.parseId(b.cloneObject(f), a.id), a.setCentered(a.selectors.thumbs_wrapper), c()
            })
        }
    }, {
        init: function (a) {
            c.getStage().then(function (b) {
                var c = new k(a, b);
                c.setup().then(function () {
                    c.init()
                })
            })
        }
    }
});