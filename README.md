# Simple twig integration for Google ReCaptcha

* Google ReCaptcha V2 (invisible) : :white_check_mark:
* Google ReCaptcha V2 (checkbox) : :white_check_mark:
* Google ReCaptcha V3 : :x:

## Installation

It's very quick and easy, in 5 steps

1. Install MaelRecaptchaBundle via composer
2. Enable the bundle
3. Generate you key and secret key
4. Configure the mael_recaptcha.yaml
5. Use the Recaptcha in your forms

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

### Setp 4: Configure the mael_recaptcha.yaml

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

#### For Google ReCaptcha V3

soon

## Contributing

List of contribution [HERE](https://github.com/Mael-91/MaelRecaptchaBundle/contributors)

You want contribute ? Fork this repertory and create a pull request after change

## License

You can find the [license](https://github.com/Mael-91/MaelRecaptchaBundle/blob/master/LICENSE) in the root directory