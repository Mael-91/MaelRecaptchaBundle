<?php

namespace Mael\MaelRecaptchaBundle\Tests\Type;

use Mael\MaelRecaptchaBundle\Type\MaelRecaptchaSubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

class MaelRecaptchaSubmitTypeTest extends TypeTestCase
{

    const KEY = 'MySuperKey';

    private $type;

    protected function getExtensions()
    {
        $type = new MaelRecaptchaSubmitType(self::KEY);
        return [
            new PreloadedExtension([$type], [])
        ];
    }

    public function setUp(): void
    {
        $this->type = new MaelRecaptchaSubmitType(self::KEY);
        parent::setUp();
    }

    public function testBuildView(): void
    {
        $view = new FormView();
        $form = $this->createMock(FormInterface::class);

        $this->assertArrayNotHasKey('label', $view->vars);
        $this->assertArrayNotHasKey('key', $view->vars);
        $this->assertArrayNotHasKey('button', $view->vars);

        $this->type->buildView($view, $form, ['label' => 'Submit']);
        $this->assertArrayHasKey('label', $view->vars);
        $this->assertArrayHasKey('key', $view->vars);
        $this->assertArrayHasKey('button', $view->vars);
        $this->assertSame(null, $view->vars['label']);
        $this->assertSame(self::KEY, $view->vars['key']);
        $this->assertSame('Submit', $view->vars['button']);
    }

    public function testGetBlockPrefix(): void
    {
        $this->assertSame('recaptcha_submit', $this->type->getBlockPrefix());
    }

    public function testGetParent(): void
    {
        $this->assertSame(TextType::class, $this->type->getParent());
    }

    public function testDefaultOptions(): void
    {
        $data = '<captcha-token>';

        $form = $this->factory->create(MaelRecaptchaSubmitType::class);
        $form->setData($data);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($data, $form->getData());

        $view = $form->createView();
        $this->assertSame(self::KEY, $view->vars['key']);
    }
}