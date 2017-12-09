<?php declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class HashDto
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="4096")
     */
    protected $text;

    /**
     * @var string
     *
     * @Assert\Length(min="0", max="4096")
     */
    protected $salt;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }
}