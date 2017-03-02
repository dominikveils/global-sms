<?php

namespace Dominik\GlobalSMS;

/**
 * Class Config
 * @package Dominik\GlobalSMS
 */
class Config
{
    /**
     * Default config
     *
     * @var array
     */
    private $config = [
        'un'           => 'GlobalSMS User Name',
        'pw'           => 'GlobalSMS Password',
        'syspw'        => 'GlobalSMS SYSPW',
        'accid'        => 'GlobalSMS ACCID',
        'from'         => 'GlobalSMS FROM phone number',
        'wsdl_url'     => 'WSDL URL',
        'wsdl_options' => [
            'trace'        => false,
            'cache_wsdl'   => WSDL_CACHE_NONE,
            'soap_version' => SOAP_1_2,
        ],
    ];
    
    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->config, $config);
    }
    
    /**
     * Magic
     *
     * @param $val
     *
     * @return mixed
     */
    public function __get($val)
    {
        if (array_key_exists($val, $this->config)) {
            return $this->config[$val];
        }
        
        return null;
    }
    
}