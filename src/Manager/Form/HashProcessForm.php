<?php declare(strict_types=1);

namespace App\Manager\Form;

use App\Dto\HashDto;
use App\Dto\HashResultDto;
use App\Form\HashType;
use App\Manager\HashManager;

class HashProcessForm extends BaseProcessForm
{
    /**
     * @var HashManager
     */
    protected $hashManager;

    public function setHashManager(HashManager $hashManager): self
    {
        $this->hashManager = $hashManager;

        return $this;
    }

    public function getInstance(): HashDto
    {
        return new HashDto();
    }

    public function getType(): string
    {
        return HashType::class;
    }

    public function onFinish(): HashResultDto
    {
        /** @var HashDto $data */
        $data = $this->form->getData();

        return $this->hashManager->generate($data);
    }

    public function onError(): void
    {
    }
}
