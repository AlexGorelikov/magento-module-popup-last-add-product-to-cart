define([
    'jquery'
], function ($) {
    'use strict';

    /**
     * Base popup active class
     *
     * @type {string}
     */
    const bodyActivePopupClass = 'cart-popup_show';

    /**
     * Popup model
     */
    return {
        body: $('body'),

        /**
         * Added body class
         *
         * @param {String} className
         */
        addClass: function (className = bodyActivePopupClass) {
            this.body.addClass(className);
        },

        /**
         * Remove body class
         *
         * @param {String} className
         */
        removeClass: function (className = bodyActivePopupClass) {
            this.body.removeClass(className);
        }
    }
});
