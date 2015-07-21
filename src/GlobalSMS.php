<?php namespace Dominik\GlobalSMS;

use Exception;

/**
 * @package Dominik/GlobalSMS
 * @author Dominik <dominikveils@gmail.com>
 */
class GlobalSMS implements SMSServiceInterface {

  use SoapHelpers;

  /**
   * Config class
   *
   * @var Config
   */
  protected $config = null;

  /**
   * @param Config $config
   */
  public function __construct(Config $config)
  {
    $this->config = $config;
  }

  /**
   * Send SMS to $to with message $message
   * 
   * @param string $to
   * @param string $message
   * @return boolean
   */
  public function send($to, $message = '')
  {
    $data = [
      'un' => $this->config->un,
      'pw' => $this->config->pw,
      'accid' => $this->config->accid,
      'sysPW' => $this->config->syspw,
      't' => date("Y-m-d H:i:s"),
      'txtUserCellular' => $this->config->from,
      'destination' => $to,
      'txtSMSmessage' => $message,
      'dteToDeliver' => ''
    ];

    $response = $this->soapCall('sendSMSrecipients', $data);

    return $response->sendSMSrecipientsResult;
  }

  /**
   * Returns the Sms balance of the account.
   *
   * @return int
   */
  public function getSmsCount()
  {
    $data = [
      'un' => $this->config->un,
      'pw' => $this->config->pw,
      'accid' => $this->config->accid,
      'sysPW' => $this->config->syspw,
      't' => date("Y-m-d H:i:s"),
    ];
    $response = $this->soapCall('getSmsCount', $data);

    return $response->getSmsCountResult;
  }

  /**
   * Get Sms Delivery Statuses , returns data table for requested date.
   *
   * @param int $day
   * @param int $month
   * @param int $year
   *
   * @return mixed
   */
  public function getSmsDeliveryStatuses($day = null, $month = null, $year = null)
  {
    $data = [
      'un' => $this->config->un,
      'pw' => $this->config->pw,
      'accid' => $this->config->accid,
      'sysPW' => $this->config->syspw,
      't' => date("Y-m-d H:i:s"),
      'DAY' => is_null($day) ? date('d') : $day,
      'MONTH' => is_null($month) ? date('m') : $month,
      'YEAR' => is_null($year) ? date('Y') : $year,
      'ErrorEx' => ''
    ];
    $response = $this->soapCall('getSmsDeliveryStatuses', $data);

    return $response->getSmsDeliveryStatusesResult;
  }
}