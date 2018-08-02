<?php

namespace Zend\SMSService\Provider;

interface SMSProviderInterface
{
    /**
     * @param string $receiver
     * @param string sender
     * @param string $message
     * @return mixed
     */
    public function send(string $receiver, string $sender, string $message);
}