<?php

namespace Zend\SMSService\Provider;

use Comtele\Services\TextMessageService;

class ComTeleSMSProvider implements SMSProviderInterface
{
    /**
     * @param string $receiver
     * @param string $sender
     * @param string $message
     * @return mixed
     */
    public function send($receiver, $sender, $message)
    {
        $textMessageService = new TextMessageService(getenv('SMS_PROVIDER_KEY'));

        return $textMessageService->send(
            $sender,
            $message,
            [$receiver]
        );
    }
}