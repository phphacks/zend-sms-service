<?php

namespace Zend\SMSService\Provider;

use TotalVoice\Client as TotalVoiceClient;

class TotalVoiceProvider implements SMSProviderInterface
{
    public function send(string $receiver, string $sender, string $message)
    {
        $client = new TotalVoiceClient(getenv('SMS_PROVIDER_KEY'));

        return $client->sms->enviar(
            $receiver,
            $message
        );
    }
}