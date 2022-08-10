<?php
/**
 * @author Alex Gorelikov ( @AlexGorelikov )
 * @filename registration.php
 * @date 28.05.22
 * @version 1.0.0
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Agoris_PopupLastAddProductToCart', __DIR__);
