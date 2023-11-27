<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023 JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Jajuma\PotCoreWebVitals\Block;

use Jajuma\PowerToys\Block\PowerToys\Dashboard;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\State;
use Magento\Framework\App\Area;

class CoreWebVitals extends Dashboard
{
    const XML_PATH_ENABLE = 'power_toys/core_web_vitals/is_enabled';

    private $state;

    public function __construct(
        Context $context,
        State $state,
        array $data = []
    ) {
        $this->state = $state;
        parent::__construct($context, $data);
    }

    public function isEnable(): bool
    {
        return $this->_scopeConfig->isSetFlag(self::XML_PATH_ENABLE) && $this->isFrontend();
    }

    public function isLazyload(): bool
    {
        return false;
    }

    public function isFrontend(): bool
    {
        $areaCode = $this->state->getAreaCode();
        return $areaCode == Area::AREA_FRONTEND;
    }
}
