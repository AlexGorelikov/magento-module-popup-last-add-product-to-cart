<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename AddSkuInCustomerSessionObserver.php
 * @date 28.05.22
 * @version 1.0.0
 */

namespace Agoris\PopupLastAddProductToCart\Observer\Cart;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Agoris\PopupLastAddProductToCart\Helper\{
    Module\ModuleConstantInterface,
    Session\CheckoutSessionHelperInterface
};

class AddSkuInCustomerSessionObserver implements ObserverInterface, ModuleConstantInterface
{
    /**
     * @var CheckoutSessionHelperInterface
     */
    private CheckoutSessionHelperInterface $checkoutSessionHelper;

    /**
     * AddSkuInCustomerSessionObserver construct
     *
     * @param CheckoutSessionHelperInterface $checkoutSessionHelper
     */
    public function __construct(CheckoutSessionHelperInterface $checkoutSessionHelper)
    {
        $this->checkoutSessionHelper = $checkoutSessionHelper;
    }

    /**
     * Add last added product in session
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer): void
    {
        $this->checkoutSessionHelper
           ->setLastProductSku([[self::PRODUCT_SKU_KEY => $observer->getData(self::PRODUCT_KEY)->getSku()]])
           ->setLastCartOperation(self::LAST_CART_OPERATION_ADD);
    }
}
