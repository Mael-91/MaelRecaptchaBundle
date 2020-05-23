<h1 style="display: flex; justify-content: center" align="center">MaelRecaptchaBundle for Symfony</h1>

<div align="center" style="display: flex; justify-content: center">
<img src="https://travis-ci.com/Mael-91/MaelRecaptchaBundle.svg?branch=master" style="padding-right: 10px">
<img src="https://codecov.io/gh/Mael-91/MaelRecaptchaBundle/branch/master/graph/badge.svg" style="padding-right: 10px">
<img src='https://bettercodehub.com/edge/badge/Mael-91/MaelRecaptchaBundle?branch=master'>
</div>

MaelRecaptchaBundle is a bundle allowing the integration of Google Recaptcha on a Symfony project.

## Available features
* Google ReCaptcha V2 (invisible) : :white_check_mark:
* Google ReCaptcha V2 (checkbox) : :white_check_mark:
* Google ReCaptcha V3 : :x:

## Installation

It's very quick and easy, in 5 steps

1. [Install MaelRecaptchaBundle via composer](https://github.com/Mael-91/MaelRecaptchaBundle#step-1--install-maelrecaptchabundle-via-composer)
2. [Enable the bundle](https://github.com/Mael-91/MaelRecaptchaBundle#step-2-enable-the-bundle)
3. [Generate you key and secret key](https://github.com/Mael-91/MaelRecaptchaBundle#step-3-generate-your-key-and-secret-key)
4. [Configure your key and secret key](https://github.com/Mael-91/MaelRecaptchaBundle#setp-4-configure-the-mael_recaptchayaml)
5. [Use the Recaptcha in your forms](https://github.com/Mael-91/MaelRecaptchaBundle#step-5-editing-your-form-and-your-view)
6. [Contributing](https://github.com/Mael-91/MaelRecaptchaBundle#contributing)
7. [License](https://github.com/Mael-91/MaelRecaptchaBundle#license)

### Step 1 : Install MaelRecaptchaBundle via composer

Run the following command :

``` php
composer require mael/recaptcha-bundle
```

You can quickly configure this bundle by using `symfony/flex` :

- Answer **no** for `google/recpatcha`
- Answer **yes** for `mael/recaptcha-bundle`

### Step 2: Enable the bundle

Register bundle into `config/bundles.php`

``` php
<?php

return [
    Mael\MaelRecaptchaBundle\MaelRecaptchaBundle::class => ['all' => true],
];
```

### Step 3: Generate your key and secret key

Go to the following link : http://www.google.com/recaptcha/admin

### Setp 4: Configure your key and secret key

In you `.env` file

Replace `YOUR_RECAPTCHA_KEY` by your public key and `YOUR_RECAPTCHA_SECRET` by your private key

``` dotenv
MAEL_RECAPTCHA_KEY=YOUR_RECAPTCHA_KEY
MAEL_RECAPTCHA_SECRET=YOUR_RECAPTCHA_SECRET
```

### Step 5: Editing your form and your view

#### For Google ReCaptcha V2 (invisible)

To enable Recaptcha (invisible) protection on your form, you must use this type: `MaelRecaptchaSubmitType::class`

``` php
// For example
->add('captcha', MaelRecaptchaSubmitType::class, [
    'label' => 'Submit',
    'constraints' => new MaelRecaptcha()
])
```

For the third parameter which is an array, you can add the constraint : `MaelRecaptcha`

Then, to complete the configuration of the invisible Recaptcha, in your twig file you need to add a id to your form
 ```twig
 {{ form_start(your_form, {'attr': {'id': 'form-recaptcha'}}) }}
```
 
To finish, add  2 `<script>` tags

Replace "id-of-your-form" by the class of your form add just above it
 
 ``` javascript
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function onSubmitCaptcha(token) {
        document.getElementById("class-of-your-form").submit();
    }
</script>
```

> __Warning, you cannot change the name of the JavaScript function.__

#### For Google ReCaptcha V2 (checkbox)

To enable Recaptcha (checkbox) protection on your form, you must use this type: `MaelRecaptchaCheckboxType::class`

``` php
->add('captcha_checkvox', MaelRecaptchaCheckboxType::class, [
    'constraints' => new MaelRecaptcha()
])
```

For the third parameter which is an array, you can add the constraint : `MaelRecaptcha`

To finish, in your twig file add  `<script>` tag

``` javascript
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
```

## Contributing

List of contribution [HERE](https://github.com/Mael-91/MaelRecaptchaBundle/contributors)

You want contribute ? Fork this repertory and create a pull request after change

## License

You can find the [license](https://github.com/Mael-91/MaelRecaptchaBundle/blob/master/LICENSE) in the root directory