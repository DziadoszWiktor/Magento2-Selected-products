<?php

declare(strict_types=1);

namespace Wiktor\SelectedProducts\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\ResponseInterface;

class Index implements HttpGetActionInterface
{
    private const TITLE_PAGE = 'Selected Products';

    protected PageFactory $_pageFactory;

    public function __construct(
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
    }

    public function execute(): Page|ResultInterface|ResponseInterface
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__(self::TITLE_PAGE));

        return $resultPage;
    }
}
