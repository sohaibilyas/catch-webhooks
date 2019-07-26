<?php

namespace SohaibIlyas\CatchWebhooks;

use Closure;
use Exception;

class FacebookWebhook {
    private $webhookData;
    private $appSecret;

    public function __construct(string $appSecret)
    {
        $this->webhookData = file_get_contents("php://input");
        $this->appSecret = $appSecret;
    }

    public function get(Closure $callback)
    {
        if (! $this->verifySignature()) {

            throw new Exception("sha1 signature did not match");
        }

        $webhookDataObject = json_decode($this->webhookData);

        return call_user_func($callback, $webhookDataObject->object, $webhookDataObject->entry);
    }

    private function verifySignature()
    {
        $sha1Sig = "sha1=" . hash_hmac('sha1', $this->webhookData, $this->appSecret);
        $xHubSig = getallheaders()['X-Hub-Signature'] ?: '';

        if ($sha1Sig === $xHubSig) {

            return true;
        }
    }
}