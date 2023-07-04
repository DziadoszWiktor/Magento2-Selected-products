<?php

declare(strict_types=1);

namespace Wiktor\SelectedProducts\Model;

use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class SelectedProductsCollectionGetter
{
    private CollectionFactory $collectionFactory;

    private ConfigurationProvider $configurationProvider;

    public function __construct(
        CollectionFactory $collectionFactory,
        ConfigurationProvider $configurationProvider
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->configurationProvider = $configurationProvider;
    }

    public function get(): Collection
    {
        $collection = $this->collectionFactory->create();
        $collection
            ->addFieldToFilter('entity_id', ['in' => $this->getIds()])
            ->setOrder('position','ASC')
            ->addAttributeToSelect('name');

        return $collection;
    }

    private function getIds(): array
    {
        return $this->configurationProvider->getSelectedProductsIds();
    }
}
