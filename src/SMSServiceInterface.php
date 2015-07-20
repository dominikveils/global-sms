<?php namespace Dominik\GlobalSMS;

use SoapClient;

interface SMSServiceInterface {
  /**
   * Send SMS to $to with message $message
   * 
   * @param string $to
   * @param string $message
   * @return boolean
   */
  public function send($to, $message = '');

  /**
   * Returns the Sms balance of the account.
   *
   * @return mixed
   */
  public function getSmsCount();

  /**
   * Get Sms Delivery Statuses , returns data table for requested date.
   *
   * @return mixed
   */
  public function getSmsDeliveryStatuses($day = null, $month = null, $year = null);

  /**
   * Set SoapClient instance
   * 
   * @param SoapClient @client
   *
   */
  public function setSoapClient(SoapClient $client);
}