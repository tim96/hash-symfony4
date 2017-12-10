<?php declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class PasswordGenerateDto
{
    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="100")
     */
    protected $count = 10;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="100")
     */
    protected $length = 10;

    /**
     * @var bool
     *
     */
    protected $usingChars = false;

    /**
     * @var bool
     */
    protected $usingSpecialChars = false;

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function isUsingChars(): bool
    {
        return $this->usingChars;
    }

    public function setUsingChars(bool $usingChars): self
    {
        $this->usingChars = $usingChars;

        return $this;
    }

    public function isUsingSpecialChars(): bool
    {
        return $this->usingSpecialChars;
    }

    public function setUsingSpecialChars(bool $usingSpecialChars): self
    {
        $this->usingSpecialChars = $usingSpecialChars;

        return $this;
    }
}
