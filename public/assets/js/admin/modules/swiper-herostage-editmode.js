/*! ledvance-2019 1.3.1-84 08-06-2020 16:24:56 */


"use strict";

function _classCallCheck(a, b) {
    if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function")
}

define(["swiperExtended", "swiperUtils"], function (a, b) {
    "use strict";

    var c = {
        autoHeight: !0,
        /*grabCursor: !0,*/
        centeredSlides: !0,
        init: !1,
        initialSlide: 0,
        loop: !1,
        navigation: {
            nextEl: "{{id}} .swiper-button-next",
            prevEl: "{{id}} .swiper-button-prev",
            disabledClass: "swiper-button-disabled"
        },
        pagination: {el: "{{id}} + .swiper-pagination", clickable: !0},
        preventInteractionOnTransition: 0,
        slidesPerView: 1,
        simulateTouch: 0,
        speed: 500
    }, d = function a(b) {
        _classCallCheck(this, a), this.node = b, this.id = b.getAttribute("id"), this.swiper = null, this.options = null
    };
    return d.prototype = {
        constructor: d, init: function () {
            this.swiper = new a(this.node, this.options)
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
