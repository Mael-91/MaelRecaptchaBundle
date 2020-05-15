<?php

namespace Mael\MaelRecaptchaBundle\Validator;

use Symfony\Component\Validator\Constraint;

class MaelRecaptcha extends Constraint
{

    public $message = 'Invalid captcha';
}