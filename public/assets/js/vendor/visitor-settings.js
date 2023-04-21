/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */

/**
 * This file contains stuff for handling client privacy settings.
 * - cookie Policy
 * - analytics permission
 */


var VisitorSettings = {
	strPrivacyCookieName: "privacy-settings",
	strAccept: "ACCEPT",
	strReject: "REJECT",
	privacySettings: {},
	/**
	 * Set privacy settings to Cookie
	 * @param settings an object: { tracking: 0|1 }
	 */
	setPrivacySettings: function () {
		Cookies.set(this.strPrivacyCookieName, this.privacySettings, {
			expires: 180
		});
	},
	/**
	 * Get privacy settings from cookie
	 */
	getPrivacySettings: function () {
		var settings = Cookies.getJSON(this.strPrivacyCookieName);
		if (settings === undefined || settings === null) {
			settings = {};
		}
		this.privacySettings = settings;
	},
	/**
	 * set the privacySettings for various consents.
	 * @param area the area for which to set the consent. Valid values are:
	 * - cookiePolicy
	 * - analytics
	 * @param consent true or false to accept or reject the consent.
	 */
	handleConsent: function (area, consent) {
		this.getPrivacySettings();
		switch (area) {
			case "cookiePolicy":
				if (consent === true) {
					this.privacySettings.cookiePolicy = this.strAccept;
				} else {
					this.privacySettings.cookiePolicy = this.strReject;
				}
				break;
			case "analytics":
				if (consent === true) {
					this.privacySettings.analytics = this.strAccept;
					this.enableTracking();
				} else {
					this.privacySettings.analytics = this.strReject;
					this.disableTracking();
				}
				break;
			default:
		}
		this.setPrivacySettings();
	},
	/**
	 * set the privacySettings for various consents.
	 * @param area the area for which to set the consent. Valid values are:
	 * - cookiePolicy
	 * - analytics
	 * @return if the area exist in the cookie and is accepted returns true otherwise false.
	 */
	checkConsent: function (area) {
		var consent = false;
		this.getPrivacySettings();
		switch (area) {
			case "cookiePolicy":
				if (this.privacySettings.cookiePolicy === this.strAccept) {
					consent = true;
				};
				break;
			case "analytics":
				if (this.privacySettings.analytics === this.strAccept) {
					consent = true;
				};
				break;
			default:
				consent = false;
		}
		return consent;
	},
	/**
	 * Enable tracking
	 * - call etracker function
	 * - store privacySettings
	 */
	enableTracking: function (tld) {
		try {
			if (tld === undefined || tld == null) {
				_etracker.enableTracking("");
			} else {
				_etracker.enableTracking(tld);
			}
		} catch (err) {
			// maybe etracker was not initialized
			// remove the cookie just in case.
			Cookies.remove("et_oi_v2");
		}
	},
	/**
	 * Disable tracking:
	 * - call etracker function
	 * - store privacySettings
	 */
	disableTracking: function (tld) {
		try {
			if (tld === undefined || tld == null) {
				_etracker.disableTracking("");
			} else {
				_etracker.disableTracking(tld);
			}
		} catch (err) {
			// maybe etracker was not initialized
			// set the cookie just in case.
			Cookies.set("et_oi_v2", "no", {
				expires: 365
			});
		} finally {
			// delete all cookies that we know about
			// get tracking secure code
		}

	},
	/**
	 * functions to be called from external
	 */
	/**
	 * check if the cookie policy has been accepted.
	 */
	checkCookiePolicy: function () {
		return this.checkConsent("cookiePolicy");
	},
	/**
	 * Accept the cookie policy.
	 */
	acceptCookiePolicy: function () {
		this.handleConsent("cookiePolicy", true);
	},
	/**
	 * Accept all non-mandatory cookies.
	 */
	acceptCookies: function () {
		console.log("called acceptCookies");
		this.acceptCookiePolicy();
		this.acceptAnalytics();
	},
	/**
	 * Reject all non-mandatory cookies.
	 */
	rejectCookies: function () {
		console.log("called rejectCookies");
		this.rejectAnalytics();
	},
	/**
	 * check if the visitor has accepted the use of analytics cookies.
	 */
	checkAnalytics: function () {
		return this.checkConsent("analytics");
	},
	/**
	 * Accept the usage of analytics cookies.
	 */
	acceptAnalytics: function () {
		this.handleConsent("analytics", true);
	},
	/**
	 * Reject the usage of analytics cookies.
	 */
	rejectAnalytics: function () {
		this.handleConsent("analytics", false);
	}
};

/**
 * Check if the tracking is allowed.
 * @param setEtrackerCookie if "true" will set the et_oi_v2 cookie, if tracking is disabled.
 * @return if the privacySettings exist and is tracking is set to "true", returns true.
 * Otherwise returns false ans sets the etracker cookie "et_oi_v2" to "no" to prevent tracking.
 */
function checkForTracking(setEtrackerCookie) {
	if (VisitorSettings.checkAnalytics()) {
		return true;
	} else {
		if (setEtrackerCookie !== null && setEtrackerCookie) {
			Cookies.set("et_oi_v2", "no", {
				expires: 365
			});
		}
		return false;
	}
}

checkForTracking(true);