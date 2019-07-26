# Catch Webhooks

Simple API to receive webhooks (real-time updates) sent by social websites e.g. Facebook using PHP.

### Installation

```
composer require sohaibilyas/catch-webhooks
```

### Usage

```php
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
