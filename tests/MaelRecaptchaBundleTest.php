<?php

namespace Mael\MaelRecaptchaBundle\Tests;

use Mael\MaelRecaptchaBundle\MaelRecaptchaBundle;
use Mael\MaelRecaptchaBundle\MaelRecaptchaContainer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MaelRecaptchaBundleTest extends TestCase
{

    public function testBuild(): void
    {
        /** @var MockObject|ContainerBuilder $container */
        $container = $this->getMockBuilder(ContainerBuilder::class)
            ->disableOriginalConstructor()->getMock();

        $bundle = new MaelRecaptchaBundle();

        $container->expects($this->once())
            ->method('addCompilerPass')
            ->with(new MaelRecaptchaContainer());

        $bundle->build($container);
    }

}