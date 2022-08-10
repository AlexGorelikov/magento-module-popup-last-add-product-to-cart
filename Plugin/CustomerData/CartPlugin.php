<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename CartPlugin.php
 * @date 28.05.22
 * @version 1.0.0
 */

namespace Agoris\PopupLastAddProductToCart\Plugin\CustomerData;

use Magento\Checkout\CustomerData\Cart;
use Agoris\PopupLastAddProductToCart\Helper\Module\ModuleConstantInterface;
use Agoris\PopupLastAddProductToCart\Helper\Session\CheckoutSessionHelperInterface;

class CartPlugin implements ModuleConstantInterface
{
    /**
     * @var CheckoutSessionHelperInterface
     */
    private CheckoutSessionHelperInterface $checkoutSessionHelper;

    /**
     * CartPlugin construct
     *
     * @param CheckoutSessionHelperInterface $checkoutSessionHelper
     */
    public function __construct(CheckoutSessionHelperInterface $checkoutSessionHelper)
    {
        $this->checkoutSessionHelper = $checkoutSessionHelper;
    }

    /**
     * Set customer data (last added product sku and operation)
     *
     * @param Cart $cart
     * @param array $data
     * @return array
     */
    public function afterGetSectionData(Cart $cart, array $data): array
    {
        return $this->prepareSectionData($data);
    }

    /**
     * Prepare customer section data (cart)
     *
     * @param array $sectionData
     * @return array
     */
    protected function prepareSectionData(array $sectionData): array
    {
        $sectionData[self::LAST_ADDED_PRODUCT_SKU_KEY] = $this->checkoutSessionHelper->getLastProductSku();
        $sectionData[self::LAST_CART_OPERATION_KEY] = $this->checkoutSessionHelper->getLastCartOperation();

        /* Reset checkout data after get section data */
        $this->resetSessionData();

        return $sectionData;
    }

    /**
     * Reset checkout data after get section data
     */
    protected function resetSessionData(): void
    {
        $this->checkoutSessionHelper
            ->resetLastProductSku()
            ->resetLastCartOperation();
    }
}
