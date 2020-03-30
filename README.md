# Simple twig integration for Google ReCaptcha

* Google ReCaptcha V2 (invisible) : :white_check_mark:
* Google ReCaptcha V2 (checkbox) : :white_check_mark:
* Google ReCaptcha V3 : :x:

## Installation

It's very quick and easy, in 3 steps process

1. Install MaelRecaptchaBundle via composer
2. Enable the bundle
3. Generate you key and secret key
4. Configure the mael_recaptcha.yaml
5. Editing your form and your view

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

### Step 5: Editing your form and your view

#### For Google ReCaptcha V2 (invisible)

In your form (ex: RegistrationType), add a new field like :

``` php
->add('captcha', MaelRecaptchaSubmitType::class, [
    'label' => 'Submit',
    'attr' => ['class' => 'btn btn-primary'],
    'constraints' => new MaelRecaptcha()
])
```

Use **MaelRecaptchaSubmitType** for the captcha type in second parameter

> Different types will be available soon

For the third parameter, it's an array who _must have_ : `constraints` in key and in value, the constraint : `new MaelRecaptcha()`<br>
It must also have `attr` key with `['id' => 'form-recaptcha']`<br><br>
Or in the view : 
 ```twig
 {{ form_start(your_form, {'attr': {'id': 'form-recaptcha'}}) }}
```
 
To finish, add  2 `<script>` tags
 
 ``` javascript
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function onSubmitCaptcha(token) {
        document.getElementById("form-recaptcha").submit();
    }
</script>
```

> _You didn't can change the function name !_

#### For Google ReCaptcha V2 (checkbox)

In your form (e.g: ContactType), add a new field like :

``` php
->add('captcha_checkvox', MaelRecaptchaCheckboxType::class, [
    'constraints' => new MaelRecaptcha()
])
```

> Different types will be available soon

Use MaelRecaptchaCheckboxType for the captcha type in second parameter<br>

For the third parameter, it's array who must have : `constraints` in key and `new MaelRecaptcha()` in value<br>
If you use Bootstrap or another responsive framework, you can pass class for the genereted div 

Example :
``` php
'attr' => [
    'class' => 'col-md-4'
]
```
In your view.html.twig, you should add `<script>` tag :

``` javascript
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
```

#### For Google ReCaptcha V3

soon

## Contributing

List of contribution [HERE](https://github.com/Mael-91/MaelRecaptchaBundle/contributors)

You want contribute ? Fork this repertory and create a pull request after change