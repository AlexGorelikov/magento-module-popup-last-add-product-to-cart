define([
    'ko',
    'underscore'
], function (ko, _) {
    'use strict';

    /**
     * Popup model
     */
    return {
        cartItems: ko.observableArray([]),
        isShow: ko.observable(false),

        /**
         * Added last added product in cart items collection
         *
         * @param {Object} cartData
         */
        addItems: function (cartData) {
            this.cartItems(this.getLastAddItems(cartData));
        },

        /**
         * Clear items collection
         */
        clearItems: function () {
           this.cartItems([]);
        },

        /**
         * Returns last added product collection to cart
         *
         * @param {Object} cartData
         * @returns {*}
         */
        getLastAddItems: function (cartData) {
            const items = cartData.items;
            return _.reduce(
                cartData.last_added_product_sku,
                (collection, obj) => [...collection, _.findWhere(items, obj)],
                []
            );
        }
    }
});
