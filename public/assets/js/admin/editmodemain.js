/*! ledvance-2019 1.3.1-84 08-06-2020 16:24:56 */
"use strict";
requirejs.config({
    baseUrl: ldv_gc.assetsBasePath + "js/",
    paths: {
        docCookies: "vendor/doc-cookies",
        driftZoom: "vendor/Drift.min",
        handlebars: "vendor/handlebars-v4.0.12",
        multirange: "vendor/multirange",
        nouislider: "vendor/nouislider.min",
        swiper: "vendor/swiper.min",
        visitorSettings: "vendor/visitor-settings",
        advanceSearchFilter: "vendor/advance-search-filter",
        presSearchFilter: "vendor/press-search-filter",
        accordion: "modules/accordion",
        "anchor-link": "modules/anchor-link",
        applicationOverview: "modules/application-overview",
        "aspect-ratio-image": "modules/aspect-ratio-image",
        breadcrumbHover: "modules/breadcrumb-hover",
        buttonCheckbox: "modules/button-checkbox",
        buttonDropdown: "modules/button-dropdown",
        buttonDropdownPrototype: "modules/button-dropdown-prototype",
        checkbox: "modules/input-checkbox",
        clickableTableRow: "modules/clickable-table-row",
        contact: "modules/contact",
        cookieDisclaimer: "modules/cookie-disclaimer",
        cookiePolicyReject: "modules/cookie-policy-reject",
        entranceCookie: "modules/entrance-cookie",
        entranceHover: "modules/entrance-hover",
        eventHelper: "modules/event-helper",
        fader: "modules/fader",
        form: "modules/form",
        handlebarsHelper: "modules/handlebars-helper",
        headerAutosuggest: "modules/header-autosuggest",
        headerController: "modules/header-controller",
        headerEnvSelect: "modules/header-environment-selection",
        headerKeybindings: "modules/header-keybindings",
        headerModel: "modules/header-model",
        headerSearch: "modules/header-search",
        headerSequencer: "modules/header-sequencer",
        headerShareSelect: "modules/header-share-selection",
        headerTemplates: "modules/header-templates",
        headerViewCampaign: "modules/header-view-campaign",
        headerViewDefault: "modules/header-view-default",
        headerViewDesktop: "modules/header-view-desktop",
        imageZoom: "modules/image-zoom",
        input: "modules/input",
        "jump-links": "modules/jump-links",
        languageSelect: "modules/language-select",
        lineFit: "modules/line-fit",
        loadMore: "modules/load-more",
        modal: "modules/modal",
        modalCore: "modules/modal-core",
        modalFastCalc: "modules/modal-fast-calculation",
        naturalQueryLanguage: "modules/natural-query-language",
        newsletterSubscr: "modules/newsletter-subscription",
        productDetail: "modules/product-detail",
        productFilter: "modules/product-filter",
        productFilterController: "modules/product-filter-controller",
        productFilterTemplates: "modules/product-filter-templates",
        productFilterView: "modules/product-filter-view",
        radio: "modules/input-radio",
        range: "modules/input-range",
        responsiveHelper: "modules/responsive-helper",
        scrollbarTop: "modules/scrollbar-top",
        "search-filter": "modules/search-filter",
        searchResults: "modules/search-results",
        select: "modules/input-select",
        sequencer: "modules/sequencer",
        sidebarPrototype: "modules/sidebar-prototype",
        squaredImage: "modules/squared-image",
        swiperEndlessScroll: "modules/swiper-endless-scroll",
        swiperEndlessScrollEditmode: "admin/modules/swiper-endless-scroll-editmode",
        swiperExtended: "modules/swiper-extended",
        swiperHerostage: "modules/swiper-herostage",
        swiperHerostageEditmode: "admin/modules/swiper-herostage-editmode",
        swiperImageGallery: "modules/swiper-image-gallery",
        swiperImageGalleryEditmode: "admin/modules/swiper-image-gallery-editmode",
        swiperProductArea: "modules/swiper-product-area",
        swiperProductSlider: "modules/swiper-product-slider",
        swiperUtils: "modules/swiper-utils",
        textTruncate: "modules/text-truncate",
        "video-helper-youtube": "modules/video-helper-youtube",
        "video-player": "modules/video-player",
        videoPlayerHero: "modules/video-player-hero",
        windowEventHelper: "modules/window-event-helper",
        xhr: "modules/xhr",
        xmlHttpRequestForm: "modules/xml-http-request-form"
    }
});
var moduleLoader = function () {
    return {
        parse: function (a) {
            var b = null == a ? document.querySelectorAll("[data-require]") : a.querySelectorAll("[data-require]");
            b.forEach(function (a) {
                var b = null;
                b = void 0 === a.dataset ? a.getAttribute("data-require") : a.dataset.require;
                var c = b.split(/,/g);
                c.forEach(function (b) {
                    var c = new Promise(function (c) {
                        b = b.replace(" ", ""), require([b], function (b) {
                            c({
                                module: b,
                                element: a
                            })
                        })
                    });
                    c.then(function (a) {
                        a.module !== void 0 && "function" == typeof a.module.init && a.module.init(a.element)
                    })
                })
            })
        },
        load: function (a) {
            var b = new Promise(function (b) {
                require([a], function (a) {
                    b({
                        module: a
                    })
                })
            });
            b.then(function (a) {
                a.module !== void 0 && "function" == typeof a.module.init && a.module.init()
            })
        }
    }
}(moduleLoader);
(function () {
    moduleLoader.parse(null)
})(), moduleLoader.load("visitorSettings"), moduleLoader.load("windowEventHelper");