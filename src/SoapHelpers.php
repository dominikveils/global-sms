<?php namespace Dominik\GlobalSMS;

use SoapClient;

trait SoapHelpers {

  /**
   * @var SoapClient
   */
  protected $soap_client = null;

  /**
   * Set SoapClient instance
   * 
   * @param SoapClient @client
   *
   */
  public function setSoapClient(SoapClient $client)
  {
    $this->soap_client = $client;
  }

  /**
   * Call Soap function
   * 
   * @param string $function
   * @param array $params
   * @return mixed
   */
  protected function soapCall($function, array $params = [])
  {
    return call_user_func_array([$this->getSoapClient(), $function], [$params]);
  }

  /**
   * Return SoapClient instance
   * 
   * @return SoapClient
   */
  protected function getSoapClient()
  {
    if (is_null($this->soap_client))
    {
      $this->soap_client = $this->makeSoapClient();
    }

    return $this->soap_client;
  }

  /**
   * Make SoapClient instance
   *
   * @return SoapClient
   */
  protected function makeSoapClient()
  {
    return new SoapClient($this->config->wsdl_url, $this->config->wsdl_options);
  }
}