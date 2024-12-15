<?php
declare(strict_types=1);

namespace Magento\EnableDisableLogModule\Logger;

use Monolog\Logger;
use Magento\EnableDisableLogModule\Model\Config;

class CustomLogger extends Logger
{
    private Config $config;

    public function __construct(
        $name,
        Config $config,
        array $handlers = [],
        array $processors = []
    ) {
        $this->config = $config;
        parent::__construct($name, $handlers, $processors);
    }

    /**
     * Adds a log record at the INFO level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function info($message, array $context = []): void
    {
        if (!$this->config->isLoggerEnabled()) {
            return;
        }
        parent::info($message, $context);
    }
}
