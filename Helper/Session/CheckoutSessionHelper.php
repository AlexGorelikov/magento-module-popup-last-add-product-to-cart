<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename CheckoutSessionHelper.php
 * @date 28.05.22
 * @version 1.0.0
 */

namespace Agoris\PopupLastAddProductToCart\Helper\Session;

use Magento\Checkout\Model\Session as CheckoutSession;
use Agoris\PopupLastAddProductToCart\Helper\Module\ModuleConstantInterface;

class CheckoutSessionHelper implements CheckoutSessionHelperInterface, ModuleConstantInterface
{
    /**
     * @var CheckoutSession
     */
    private CheckoutSession $session;

    /**
     * CheckoutSessionHelper construct
     *
     * @param CheckoutSession $session
     */
    public function __construct(CheckoutSession $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritDoc}
     *
     * @param array $lastSkus
     * @param bool $isMerged
     * @return CheckoutSessionHelperInterface
     */
    public function setLastProductSku(array $lastSkus, bool $isMerged = true): CheckoutSessionHelperInterface
    {
        /* Merged data, needed if several items were added to the cart at the same time */
        if ($isMerged) $lastSkus = array_merge($this->getLastProductSku(), $lastSkus);

        $this->session->setData(self::LAST_ADDED_PRODUCT_SKU_KEY, $lastSkus);
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function getLastProductSku(): array
    {
        return $this->session->getData(self::LAST_ADDED_PRODUCT_SKU_KEY) ?? [];
    }

    /**
     * {@inheritDoc}
     *
     * @param string $operation
     * @return CheckoutSessionHelperInterface
     */
    public function setLastCartOperation(string $operation): CheckoutSessionHelperInterface
    {
        $this->session->setData(self::LAST_CART_OPERATION_KEY, $operation);
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getLastCartOperation(): string
    {
        return $this->session->getData(self::LAST_CART_OPERATION_KEY) ?? self::LAST_CART_OPERATION_NONE;
    }

    /**
     * {@inheritDoc}
     *
     * @return CheckoutSessionHelperInterface
     */
    public function resetLastProductSku(): CheckoutSessionHelperInterface
    {
        $this->setLastProductSku([], false);
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return CheckoutSessionHelperInterface
     */
    public function resetLastCartOperation(): CheckoutSessionHelperInterface
    {
        return $this->setLastCartOperation(self::LAST_CART_OPERATION_NONE);
    }
}
