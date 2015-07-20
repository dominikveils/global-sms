<?php namespace Dominik\GlobalSMS\Tests;

use Dominik\GlobalSMS\GlobalSMS;
use Dominik\GlobalSMS\Config;
use Mockery;

class GlobalSMSTest extends \PHPUnit_Framework_TestCase {

  public function tearDown()
  {
    Mockery::close();
  }

  /**
   * @test
   */
  public function it_should_instantiate()
  {
    $service = $this->getService();
    $this->assertInstanceOf('Dominik\GlobalSMS\SMSServiceInterface', $service);
  }

  /**
   * @test
   */
  public function it_should_send_sms_request()
  {
    $mock = $this->mockSoapClient();
    $mock->shouldReceive('sendSMSrecipients')->once()->andReturn($mock);
    $mock->sendSMSrecipientsResult = true;
    $service = $this->getService();
    $service->setSoapClient($mock);

    $this->assertTrue($service->send('test', 'test'));
  }

  /**
   * @test
   */
  public function it_should_send_getSmsCount_request()
  {
    $count = 10;
    $mock = $this->mockSoapClient();
    $mock->shouldReceive('getSmsCount')->once()->andReturn($mock);
    $mock->getSmsCountResult = $count;
    $service = $this->getService();
    $service->setSoapClient($mock);

    $this->assertEquals($count, $service->getSmsCount());
  }

  /**
   * @test
   */
  public function it_should_send_getSmsDeliveryStatuses_request()
  {
    $result = 'result';
    $mock = $this->mockSoapClient();
    $mock->shouldReceive('getSmsDeliveryStatuses')->once()->andReturn($mock);
    $mock->getSmsDeliveryStatusesResult = $result;
    $service = $this->getService();
    $service->setSoapClient($mock);

    $this->assertEquals($result, $service->getSmsDeliveryStatuses());
  }

  /**
   * Instantiate service
   *
   * @return \Dominik\GlobalSMS\SMSServiceInterface
   */
  private function getService()
  {
    $config = new Config;

    return new GlobalSMS($config);
  }

  /**
   * Mock SOAP Client
   *
   * @return mixed
   */
  private function mockSoapClient()
  {
    $mock = Mockery::mock('SoapClient');

    return $mock;
  }

}