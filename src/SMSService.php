<?php

namespace Zend\SMSService;

use Zend\SMSService\Exception\MessageWasNotStringException;
use Zend\SMSService\Exception\ReceiverWasNotGivenException;
use Zend\SMSService\Provider\SMSProviderInterface;

class SMSService
{
    /**
     * @var SMSProviderInterface
     */
    private $smsProvider;

    /**
     * SMSService constructor.
     * @param SMSProviderInterface $smsProvider
     */
    public function __construct(SMSProviderInterface $smsProvider)
    {
        $this->smsProvider = $smsProvider;
    }

    /**
     * @param string $message
     * @param string $receiverPhoneNumber
     * @param string $senderPhoneNumber
     * @return mixed
     * @throws MessageWasNotStringException
     * @throws ReceiverWasNotGivenException
     */
    public function sendMessage($message, $receiverPhoneNumber, $senderPhoneNumber="")
    {
        if (!is_string($message)) {
            throw new MessageWasNotStringException();
        }

        if (empty($receiverPhoneNumber)) {
            throw new ReceiverWasNotGivenException();
        }

        try {
            return $this->smsProvider->send(
                $receiverPhoneNumber,
                $senderPhoneNumber,
                $message
            );
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}