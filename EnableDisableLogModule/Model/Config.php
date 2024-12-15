<?php
declare(strict_types=1);

namespace Magento\EnableDisableLogModule\Model;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    private const XML_PATH_CUSTOM_LOGGER_DEBUG = 'custom_logger/general/enabled';
    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }
    
     /**
     * @param null $storeId
     * @return bool
     */
    public function isLoggerEnabled($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CUSTOM_LOGGER_DEBUG,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
