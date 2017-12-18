<?php declare(strict_types=1);

namespace App\Manager\Form;

use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class BaseProcessForm implements ProcessInterface
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var FormInterface
     */
    protected $form;

    public function __construct(
        RequestStack $requestStack,
        FormFactory $formFactory
    ) {
        $this->requestStack = $requestStack;
        $this->formFactory = $formFactory;
    }

    public abstract function getInstance();

    public abstract function getType(): string;

    public abstract function onFinish();

    public abstract function onError();

    public function handle()
    {
        $this->createFormInstance();

        $this->form->handleRequest($this->requestStack->getCurrentRequest());
        if ($this->form->isSubmitted() && $this->form->isValid()) {
            return $this->onFinish();
        }

        return $this->onError();
    }

    public function getForm(): ?FormInterface
    {
        return $this->form;
    }

    protected function createFormInstance()
    {
        $this->form = $this->createForm($this->getType(), $this->getInstance());
    }

    protected function createForm(string $type, $instance): FormInterface
    {
        return $this->formFactory->create($type, $instance);
    }
}
