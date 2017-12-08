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

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     *
     * @return $this
     */
    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }
}