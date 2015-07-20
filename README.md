GlobalSMS API Helpers
================
Simple GlobalSMS.co.il API helper class

Installation
============
`composer require dominikveils/global-sms`

Usage
============
```php
<?php

require_once 'vendor/autoload.php';

$config = new Dominik\GlobalSMS\Config([
    'un'        => '', // GlobalSMS UN
    'pw'        => '', // GlobalSMS PW
    'syspw'     => '', // GlobalSMS SYSPW
    'accid'     => '', // GlobalSMS ACCID
    'from'      => '', // GlobalSMS FROM phone number,
    'wsdl_url'  => '',
]);
$service = new Dominik\GlobalSMS\GlobalSMS($config);

// $to = "__PHONE__";
// $message = "__MESSAGE__";
// var_dump($service->send($to, $message));
// var_dump($service->getSmsCount());
// $response = $service->getSmsDeliveryStatuses(date('d'));
```
