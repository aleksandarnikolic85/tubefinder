/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
"use strict";function _classCallCheck(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}define(["headerAutosuggest"],function(a){"use strict";var b={searchFlyout:{default:".o-header.-is-default .o-search-flyout",desktop:".m-header-container.-large .o-search-flyout"},searchFlyoutClose:{default:".o-header.-is-default .o-search-flyout .m-searchbar button",desktop:".m-header-container.-large .o-search-flyout .m-searchbar .a-button-close"},suggestContainer:{default:".o-header.-is-default .js-search-flyout-autosuggest",desktop:".m-header-container.-large .js-search-flyout-autosuggest"},input:{default:".o-header.-is-default input",desktop:".m-header-container.-large input"},backdrop:".m-flyout-backdrop-search"},c=function a(b){_classCallCheck(this,a),this.stage=b};return c.prototype={constructor:c,addEvents:function(){this.scope.searchFlyoutClose.invokeMethod="handleClickOnClose",this.scope.searchFlyoutClose.removeEventListener("click",this),this.scope.searchFlyoutClose.addEventListener("click",this)},backdropIn:function(){var a=this,b=function(){a.handleClickOnClose()};this.scope.backdrop.classList.add("in"),this.scope.backdrop.removeEventListener("click",b),this.scope.backdrop.addEventListener("click",b)},backdropOff:function(){this.scope.backdrop.classList.remove("in")},init:function(a){this.scope={searchFlyout:a.querySelector(b.searchFlyout[this.stage]),searchFlyoutClose:a.querySelector(b.searchFlyoutClose[this.stage]),suggestContainer:a.querySelector(b.suggestContainer[this.stage]),input:a.querySelector(b.input[this.stage]),backdrop:document.querySelector(b.backdrop)},this.addEvents()},handleEvent:function(a){a.preventDefault(),this[a.currentTarget.invokeMethod].call(this)},handleClickOnClose:function(){this.scope.searchFlyout.classList.remove("-is-active"),this.scope.searchFlyout.classList.add("-is-not-active"),this.scope.input.value="",a.clear(this.scope.suggestContainer),this.backdropOff()},showSearchBar:function(){this.scope.searchFlyout.classList.remove("-is-not-active"),this.scope.searchFlyout.classList.add("-is-active"),this.addEvents(),("default"==this.stage||"sm"==this.stage)&&this.backdropIn()}},c});