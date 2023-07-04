<?php

declare(strict_types=1);

namespace Wiktor\SelectedProducts\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    private const ROUTE = 'selected';
    private const MODULE_NAME = 'selected';
    private const CONTROLLER_NAME = 'index';

    private ActionFactory $actionFactory;

    public function __construct(
        ActionFactory $actionFactory
    ) {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request): ?ActionInterface
    {
        $identifier = trim($request->getPathInfo(), '/');
        if ($identifier === self::ROUTE){
            $request->setModuleName(self::MODULE_NAME);
            $request->setControllerName(self::CONTROLLER_NAME);
            $request->setActionName('index');
        }

        return $this->actionFactory->create(Forward::class);
    }
}
