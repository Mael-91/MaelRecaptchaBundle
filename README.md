# Simple twig integration for Google ReCaptcha

## Installation

It's very quick and easy, in 3 steps process

1. Install MaelRecaptchaBundle via composer
2. Enable the bundle
3. Generate you key and secret key
4. Configure the mael_recaptcha.yaml

### Step 1 : Install MaelRecaptchaBundle via composer

Run the following command :

``` php
composer require mael/recaptcha-bundle
```

### Step 2: Enable the bundle
Enable the bundle in you config/bundles.php

``` php
<?php

return [
    Mael\MaelRecaptchaBundle\MaelRecaptchaBundle::class => ['all' => true],
];
```

### Step 3: Generate your key and secret key

Go to the following link : http://www.google.com/recaptcha/admin

### Setp 4: Configure the mael_recaptcha.yaml

``` yaml
mael_recaptcha:
  key: 'Your key'
  secret: 'Your secret key'
```

Or, if you want to use via environment variable

``` dotenv
GOOGLE_RECAPTCHA_KEY=Your key
GOOGLE_RECAPTCHA_SECRET=Your secret key
``` 