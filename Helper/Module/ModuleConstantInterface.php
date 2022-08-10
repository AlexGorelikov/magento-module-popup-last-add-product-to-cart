<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename ModuleConstantInterface.php
 * @date 28.05.22
 * @version 1.0.0
 */

namespace Agoris\PopupLastAddProductToCart\Helper\Module;

interface ModuleConstantInterface
{
    /**
     * Constant for module
     */
    const LAST_ADDED_PRODUCT_SKU_KEY = 'last_added_product_sku';
    const LAST_CART_OPERATION_KEY = 'last_cart_operation';
    const LAST_CART_OPERATION_ADD = 'add';
    const LAST_CART_OPERATION_REMOVE = 'remove';
    const LAST_CART_OPERATION_NONE = 'none';
    const PRODUCT_KEY = 'product';
    const PRODUCT_SKU_KEY = 'product_sku';
}
