<?php
declare(strict_types=1);

namespace Magento\EnableDisableLogModule\Controller\Index;

use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Serialize\SerializerInterface;

class Index implements HttpGetActionInterface
{
    private PsrLoggerInterface $logger;
    private PageFactory $pageFactory;
    private RequestInterface $request;
    private SerializerInterface $serializer;

    public function __construct(
        PsrLoggerInterface $logger,
        PageFactory $pageFactory, 
        RequestInterface $request,
        SerializerInterface $serializer
    ) {
        $this->logger = $logger;
        $this->pageFactory = $pageFactory;
        $this->request = $request;
        $this->serializer = $serializer;
    }

    public function execute()
    {
        // Log a string
        $this->logger->info('Logging is Enabled. This is a custom log message.');

        // Log an array
        $data = ['key1' => 'value1', 'key2' => 'value2'];
        $serializedData = $this->serializer->serialize($data); // Serialize the Data
        $this->logger->info('Logging is Enabled. Serialized Data: ' . $serializedData); // Log the Serialized Data
        
        // Get the params that were passed from our Router
        //$firstParam = $this->request->getParam('first_param', null);
        //$secondParam = $this->request->getParam('second_param', null);
        return $this->pageFactory->create();
    }
}