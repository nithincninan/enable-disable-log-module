<?php
declare(strict_types=1);

namespace Magento\EnableDisableLogModule\Controller\Index;

use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    private PsrLoggerInterface $logger;
    private PageFactory $pageFactory;
    private RequestInterface $request;

    public function __construct(
        PsrLoggerInterface $logger,
        PageFactory $pageFactory, 
        RequestInterface $request
    ) {
        $this->logger = $logger;
        $this->pageFactory = $pageFactory;
        $this->request = $request;
    }

    public function execute()
    {
        $this->logger->info('Logging is Enabled. This is a custom log message.');
        
        // Get the params that were passed from our Router
        //$firstParam = $this->request->getParam('first_param', null);
        //$secondParam = $this->request->getParam('second_param', null);
        return $this->pageFactory->create();
    }
}