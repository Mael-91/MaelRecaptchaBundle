<?php

namespace Mael\MaelRecaptchaBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MaelRecaptchaContainer implements CompilerPassInterface {

    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('twig.form.resources')) {
            $resources = $container->getParameter('twig.form.resources') ?: [];
            array_unshift($resources, '@MaelRecaptcha/fields.html.twig');
            $container->setParameter('twig.form.resources', $resources);
        }
    }
}