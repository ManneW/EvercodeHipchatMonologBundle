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
evercode_hipchat:
    name: Error Reporter
    room: Errors
```
