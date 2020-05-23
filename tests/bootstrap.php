<?php

error_reporting(-1);
date_default_timezone_set('UTC');

if (!file_exists(dirname(__DIR__, 1) . '/composer.lock')) {
    die("Dependencies must be installed using composer\n\nSee http://getcomposer.org for help with installing composer\n");
}

require dirname(__DIR__, 1) . '/vendor/autoload.php';