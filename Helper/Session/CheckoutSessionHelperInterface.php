<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename CheckoutSessionHelperInterface.php
 * @date 28.05.22
 * @version 1.0.0
 */

namespace Agoris\PopupLastAddProductToCart\Helper\Session;

interface CheckoutSessionHelperInterface
{
    /**
     * Set session last product sku collection
     *
     * @param array $lastSkus
     * @param bool $isMerged
     * @return CheckoutSessionHelperInterface
     */
    public function setLastProductSku(array $lastSkus, bool $isMerged): CheckoutSessionHelperInterface;

    /**
     * Returns last product sku collection
     *
     * @return array
     */
    public function getLastProductSku(): array;

    /**
     * Set session last cart operation
     *
     * @param string $operation
     * @return CheckoutSessionHelperInterface
     */
    public function setLastCartOperation(string $operation): CheckoutSessionHelperInterface;

    /**
     * Returns last operation
     *
     * @return string
     */
    public function getLastCartOperation(): string;

    /**
     * Reset session last product sku collection (set empty array)
     *
     * @return CheckoutSessionHelperInterface
     */
    public function resetLastProductSku(): CheckoutSessionHelperInterface;

    /**
     * Reset session last cart operation (set operation 'none')
     *
     * @return CheckoutSessionHelperInterface
     */
    public function resetLastCartOperation(): CheckoutSessionHelperInterface;
}
