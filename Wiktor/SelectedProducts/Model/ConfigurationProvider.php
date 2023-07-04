<?php

declare(strict_types=1);

namespace Wiktor\SelectedProducts\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ConfigurationProvider
{
    private const SELECTED_PRODUCT_LIST_PATH = 'selected_products/general/selected_products_list';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function getSelectedProductsIds(): array
    {
        $productList = $this->scopeConfig->getValue(
            self::SELECTED_PRODUCT_LIST_PATH,
            ScopeInterface::SCOPE_STORE,
        );

        return explode(', ', $productList);
    }
}
