README
======

Installation
------------

Install using Composer:

```
./composer require evercodelab/hipchat-monolog-bundle
```

Add the bundle to your AppKernel.php:

``` php
$bundles = array(
    //...
    new Mannew\HipChatBundle\MannewHipchatBundle(),
    new Evercode\HipchatBundle\EvercodeHipchatMonologBundle(),
);
```

And add hipchat handler:
``` yaml
monolog:
    handlers:
        hipchat:
            type: service
            id: evercode.monolog.handler.hipchat
```

You also can configure it:
``` yaml
mannew_hipchat:
    auth_token: YOUR_HIPCHAT_AUTH_TOKEN_HERE

evercode_hipchat_monolog:
    name: Error Reporter
    room: Errors
```
