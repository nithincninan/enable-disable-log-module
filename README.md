# Enable Disable Log Module

 - Custom module: Magento_EnableDisableLogModule

 - Controller class : Magento\EnableDisableLogModule\Controller\Index\Index

 - Setup a log Handler in di.xml : Magento\EnableDisableLogModule\etc\di.xml

 - Log file (enable_disable_file.log) in Handler: Magento\EnableDisableLogModule\Logger\Handler

 - Logic to enable/disable log file: Magento\EnableDisableLogModule\Logger\CustomLogger

 - Log data as a string | Array: Magento\EnableDisableLogModule\Controller\Index\Index

 - Track the O/P: var/log/enable_disable_file.log


-------------- 


Use a custom logger handler class to log messages into a specific log file:

        
1. Inject the MyCustomEnableDisableLogger virtual type in the Magento\EnableDisableLogModule\Controller\Index\Index object:
   
   ```<type name="Magento\EnableDisableLogModule\Controller\Index\Index">
        <arguments>
            <argument name="logger" xsi:type="object">MyCustomEnableDisableLogger</argument>
        </arguments>
    </type>```

2. Define the handler ( Magento\EnableDisableLogModule\Logger\Handler ) for this class as a virtual type in the module’s di.xml file:

    ```<virtualType name="MyCustomEnableDisableLogger" type="Magento\EnableDisableLogModule\Logger\CustomLogger">
        <arguments>
            <argument name="name" xsi:type="string">enableDisableLog</argument>
            <argument name="handlers" xsi:type="array">
                <item name="system" xsi:type="object">Magento\EnableDisableLogModule\Logger\Handler</item>
            </argument>
        </arguments>
    </virtualType>```

3. Create a class that logs data. In this example, the class is defined in Magento\EnableDisableLogModule\Logger\Handler

    ```namespace Magento\EnableDisableLogModule\Logger;

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
    }```


--------------


File: Magento\EnableDisableLogModule\Controller\Index\Index

  // Log a string
 
   $this->logger->info('This is a custom log message.’);

   Output: [2024-12-16T04:19:38.859259+00:00] enableDisableLog.INFO: Logging is Enabled. This is a custom log message. [] []


  // Log an array
 
   $data = ['key1' => 'value1', 'key2' => 'value2'];

   $serializedData = $this->serializer->serialize($data); // Serialize the Data
   
   $this->logger->info('Serialized Data: ' . $serializedData); // Log the Serialized Data


   Output: [2024-12-16T04:19:38.859259+00:00] enableDisableLog.INFO: Logging is Enabled. Serialized Data: {"key1":"value1","key2":"value2"} [] []