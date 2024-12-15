<?php
declare(strict_types=1);

namespace Magento\EnableDisableLogModule\Logger;

use Magento\Framework\Logger\Handler\Base as BaseHandler;
use Monolog\Logger as MonologLogger;

class Handler extends BaseHandler
{
    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/enable_disable_file.log';
}