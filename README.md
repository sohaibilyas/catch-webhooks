# Catch Webhooks

Simple API to receive webhooks (real-time updates) sent by social websites e.g. Facebook using PHP.

### Installation

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
composer require sohaibilyas/catch-webhooks
```

### Usage

```
use SohaibIlyas\CatchWebhooks\FacebookWebhook;

require './vendor/autoload.php';

$facebookWebhook = new FacebookWebhook('fb-app-secret');

$facebookWebhook->get(function($type, $webhookArray) {

    // type can be page or user

    if ($type === 'page') {
        
        print_r($webhookArray);
    }
});
```