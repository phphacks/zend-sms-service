<?php

use Zend\SMSService\SMSService;
use Zend\SMSService\Provider\ComTeleSMSProvider;
use Zend\SMSService\Exception\MessageWasNotStringException;
use Zend\SMSService\Exception\ReceiverWasNotGivenException;
use Zend\SMSService\Tests\SMSProviderStub;
use PHPUnit\Framework\TestCase;

class SMSServiceTest extends TestCase
{
    public function testShouldReturnExceptionWhenMessageNotIsString()
    {
        $smsService = new SMSService(new ComTeleSMSProvider());

        $this->expectException(MessageWasNotStringException::class);

        $smsService->sendMessage(
            10,
            "999999999",
            "99999999"
        );
    }

    public function testShouldThrowReceiverExceptionWhenReceiverWasNotGiven()
    {
        $smsService = new SMSService(new ComTeleSMSProvider());

        $this->expectException(ReceiverWasNotGivenException::class);

        $smsService->sendMessage(
            "foo Message",
            "",
            "99999999"
        );
    }

    public function testIfSendMessageReturnTrue()
    {
        $provider = new SMSProviderStub();

        $response = $provider->send(
            "9999999999",
            "",
            "test message"
        );

        $this->assertTrue($response);
    }
}
