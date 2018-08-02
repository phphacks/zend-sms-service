<?php

namespace Zend\SMSService\Tests;

use Zend\SMSService\Provider\SMSProviderInterface;

class SMSProviderStub implements SMSProviderInterface
{
    public function send(string $receiver, string $sender, string $message)
    {
        return true;
    }
}