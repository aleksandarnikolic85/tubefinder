/*! ledvance-2019 1.3.1-84 08-06-2020 16:24:56 */
"use strict";

function _classCallCheck(a, b) {
    if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function")
}

define(["swiperExtended", "swiperUtils"], function (a, b) {
    "use strict";
    var c = {
        centeredSlides: !1,
        customParams: {
            activeClass: ".swiper-slide-active",
            hiddenContainer: "{{id}} .swiper-hidden-container",
            hiddenColumn: "{{id}} .swiper-hidden-container .row [class^=\"col-\"]",
            inactiveClass: ".swiper-slide-inactive",
            invisibleClass: "{{id}} .swiper-slide-invisible-blank",
            invokeOnInit: [{key: "spaceBetween", method: "getMargin"}, {
                key: "slidesOffsetBefore",
                method: "getOffsetBefore"
            }],
            swiperSlide: ".swiper-slide",
            swiperInnerSlide: "{{id}} .swiper-slide-inner",
            resizeWrapper: "{{id}} .swiper-resize-wrapper",
        },
        simulateTouch: 0,
        grabCursor: !1,
        init: !1,
        initialSlide: 0,
        loopedSlides: null,
        loop: !1,
        navigation: {
            nextEl: "{{id}} .swiper-button-next",
            prevEl: "{{id}} .swiper-button-prev",
            disabledClass: "{{id}} swiper-button-disabled"
        },
        pagination: {el: "{{id}} + .swiper-pagination", clickable: !0},
        observer: !0,
        observeSlideChildren: !0,
        on: {
            init: function () {
                this.mutateSlides()
            }, observerUpdate: function () {
                this.enableButtonNext(), this.show(), this.update(), "ready" !== this.state && (this.slideToLoop(0, 0), this.prepareStart())
            }, resize: function () {
                this;
                this.hide(), this.removePagination(), this.disableButtonNext(), this.disableButtonPrev()
            }, slidePrevTransitionStart: function () {
                0 == this.realIndex && (this.disableButtonPrev(), this.state = "startposition", this.prepareStart())
            }, slideNextTransitionEnd: function () {
                0 < this.realIndex && "ready" == this.state && (this.enableButtonPrev(), this.prepareAfterStart())
            }
        },
        slidesPerGroup: 1,
        slidesPerView: "auto",
        slidesOffsetBefore: 0,
        speed: 500
    }, d = function a(b) {
        _classCallCheck(this, a), this.id = b.getAttribute("id"), this.node = b, this.options = null, this.resizeTimer = null, this.swiper = null
    };
    return d.prototype = {
        constructor: d, init: function () {
            var b = this;
            this.swiper = new a(this.node, this.options), window.addEventListener("resize", function () {
                clearTimeout(b.resizeTimer), b.resizeTimer = setTimeout(function () {
                    b.reInit(b.swiper.swiper)
                }, 300)
            })
        }, reInit: function (b) {
            b.destroy(!1, !0), this.swiper = new a(this.node, this.options), b.show()
        }, setup: function () {
            var a = this;
            return new Promise(function (d) {
                a.options = b.parseId(b.cloneObject(c), a.id), d()
            })
        }
    }, {
        init: function (a) {
            var b = new d(a);
            b.setup().then(function () {
                b.init()
            })
        }
    }
});