define([
    'jquery',
    'underscore',
    'uiComponent',
    'Magento_Customer/js/customer-data',
    'mage/url',
    'agorisPopupModel',
    'agorisBodyAction'
], function ($, _, popupComponent, customerData, url, popupModel, bodyAction) {
    'use strict';

    return popupComponent.extend({
        /**
         * Default
         */
        defaults: {
            template: 'Agoris_PopupLastAddProductToCart/popup-template',
            customerDataSectionCart: ['cart'],
            addCartOperation: 'add',
            noneCartOperation: 'none',
            cartPathUrl: 'checkout/cart',
        },

        /**
         * Base props object
         */
        cartItemsCollection: popupModel.cartItems,
        isShow: popupModel.isShow,

        /**
         * Initialize component
         */
        initialize: function () {
            this._super();
            customerData.get(this.customerDataSectionCart).subscribe(this.callbackSectionCart, this);
        },

        /**
         * Callback insert value customer data
         *
         * @param {Object} data
         */
        callbackSectionCart: function (data) {
            if (!data || !this.isShowPopup(data)) return;

            popupModel.clearItems();
            popupModel.addItems(data);
            this.clearLastAddedProductInCustomerData(data);
            this.showPopup();
        },

        /**
         * Show action popup
         */
        showPopup: function () {
            bodyAction.addClass();
            popupModel.isShow(true);
        },

        /**
         * Hide action popup
         */
        hidePopup: function () {
            bodyAction.removeClass();
            popupModel.isShow(false);
        },

        /**
         * Check show popup
         *
         * @param {Object} data
         * @returns {boolean}
         */
        isShowPopup: function (data) {
            return this.isAddOperation(data) && this.isNotEmptyLastAddedSku(data);
        },

        /**
         * Check cart add cart operation
         *
         * @param {Object} data
         * @returns {boolean}
         */
        isAddOperation: function (data) {
            return data.last_cart_operation === this.addCartOperation;
        },

        /**
         * Check not empty collection
         *
         * @param {Object} data
         * @returns {boolean}
         */
        isNotEmptyLastAddedSku: function (data) {
            return data.last_added_product_sku.length !== 0;
        },

        /**
         * Clear last added product in customer data
         *
         * @param {Object} data
         */
        clearLastAddedProductInCustomerData: function (data) {
            data.last_added_product_sku = [];
            data.last_cart_operation = this.noneCartOperation;
            customerData.set(this.customerDataSectionCart, data);
        },

        /**
         * Returns cart url
         *
         * @returns {string}
         */
        getCartUrl: function () {
            return url.build(this.cartPathUrl);
        }
    });
});
