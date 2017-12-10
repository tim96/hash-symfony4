<?php declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class RandomStringDto
{
    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Range(min="1")
     */
    protected $length = 64;

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }
}
