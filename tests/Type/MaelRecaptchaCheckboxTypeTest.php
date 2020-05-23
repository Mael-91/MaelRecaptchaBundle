<?php

namespace Mael\MaelRecaptchaBundle\Tests\Type;

use Mael\MaelRecaptchaBundle\Type\MaelRecaptchaCheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

class MaelRecaptchaCheckboxTypeTest extends TypeTestCase
{

    const KEY = 'MySuperKey';
    private $type;

    protected function getExtensions()
    {
        $type = new MaelRecaptchaCheckboxType(self::KEY);
        return [
            new PreloadedExtension([$type], [])
        ];
    }

    public function setUp(): void
    {
        $this->type = new MaelRecaptchaCheckboxType(self::KEY);
        parent::setUp();
    }

    public function testBuildView(): void
    {
        $view = new FormView();
        $form = $this->createMock(FormInterface::class);

        $this->assertArrayNotHasKey('key', $view->vars);

        $this->type->buildView($view, $form, []);
        $this->assertArrayHasKey('key', $view->vars);
        $this->assertSame(self::KEY, $view->vars['key']);
    }

    public function testGetBlockPrefix(): void
    {
        $this->assertSame('recaptcha_checkbox', $this->type->getBlockPrefix());
    }

    public function testGetParent(): void
    {
        $this->assertSame(TextType::class, $this->type->getParent());
    }

    public function testDefaultOptions(): void
    {
        $data = '<captcha-token>';

        $form = $this->factory->create(MaelRecaptchaCheckboxType::class);
        $form->setData($data);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($data, $form->getData());

        $view = $form->createView();
        $this->assertSame(self::KEY, $view->vars['key']);
    }

}