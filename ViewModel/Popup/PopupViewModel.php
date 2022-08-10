<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename PopupViewModel.php
 * @date 28.05.22
 * @version 1.0.0
 */

namespace Agoris\PopupLastAddProductToCart\ViewModel\Popup;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Agoris\PopupLastAddProductToCart\Helper\Module\{
    ModuleConstantInterface,
    ModuleHelper
};

class PopupViewModel implements ArgumentInterface, ModuleConstantInterface
{
    /**
     * @var ModuleHelper
     */
    private ModuleHelper $moduleHelper;

    /**
     * PopupViewModel construct
     *
     * @param ModuleHelper $moduleHelper
     */
    public function __construct(ModuleHelper $moduleHelper)
    {
        $this->moduleHelper = $moduleHelper;
    }

    /**
     * Check enable module in store config
     *
     * @return bool
     */
    public function isEnable(): bool
    {
        return $this->moduleHelper->isEnable();
    }
}
