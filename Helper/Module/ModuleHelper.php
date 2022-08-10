<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename ModuleHelper.php
 * @date 28.05.22
 * @version 1.0.0
 */

namespace Agoris\PopupLastAddProductToCart\Helper\Module;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ModuleHelper
{
    /**
     * Constant obj
     */
    const ENABLE_XML_PATH = 'agoris_popup_last_add_product_to_cart/general/enable';

    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    /**
     * ModuleHelper construct
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Check enable module in store config
     *
     * @return bool
     */
    public function isEnable(): bool
    {
        return (bool) $this->scopeConfig->getValue(self::ENABLE_XML_PATH, ScopeInterface::SCOPE_STORE);
    }
}
