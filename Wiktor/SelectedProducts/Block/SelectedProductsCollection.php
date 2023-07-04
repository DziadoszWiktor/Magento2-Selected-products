<?php

declare(strict_types=1);

namespace Wiktor\SelectedProducts\Block;

use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Framework\View\Element\Template;
use Wiktor\SelectedProducts\Model\SelectedProductsCollectionGetter;

class SelectedProductsCollection extends Template
{
    private SelectedProductsCollectionGetter $collectionGetter;

    public function __construct(
        Template\Context $context,
        SelectedProductsCollectionGetter $collectionGetter,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->collectionGetter = $collectionGetter;
    }

    public function getProducts(): Collection
    {
        return $this->collectionGetter->get();
    }
}
