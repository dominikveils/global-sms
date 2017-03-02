<?php
namespace Dominik\GlobalSMS;

/**
 * Interface SMSServiceInterface
 * @package Dominik\GlobalSMS
 */
interface SMSServiceInterface
{
    /**
     * Send SMS to $to with message $message
     *
     * @param string $to
     * @param string $message
     *
     * @return boolean
     */
    public function send($to, $message = '');
    
    /**
     * Returns the Sms balance of the account.
     *
     * @return int
     */
    public function getSmsCount();
    
    /**
     * Get Sms Delivery Statuses , returns data table for requested date.
     *
     * @param int $day
     * @param int $month
     * @param int $year
     *
     * @return mixed
     */
    public function getSmsDeliveryStatuses($day = null, $month = null, $year = null);
    
    /**
     * @param int $day
     * @param int $month
     * @param int $year
     *
     * @return mixed
     */
    public function getSmsResponses($day = null, $month = null, $year = null);
}