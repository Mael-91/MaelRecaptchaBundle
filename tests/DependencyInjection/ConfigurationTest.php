<?php

namespace Mael\MaelRecaptchaBundle\Tests\DependencyInjection;

use Mael\MaelRecaptchaBundle\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends TestCase
{

    public function YAMLConfiguration()
    {
        return [
            [
                [
                    'mael_recaptcha' => [
                        'key' => '1234',
                        'secret' => '1234'
                    ]
                ]
            ]
        ];
    }

    public function testGetConfigTreeBuilder(): void
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, [
            [
                'key' => '1234',
                'secret' => '1234'
            ]
        ]);
        $expected = [
            'key' => '1234',
            'secret' => '1234'
        ];
        $this->assertSame($expected, $config);
    }

}