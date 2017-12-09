<?php declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class Base64Dto
 * @package App\Dto
 *
 * @Assert\Callback(callback="isValidSelectType")
 */
class Base64Dto
{
    protected const CONVERT_TO_BASE_64 = 'toBase64';
    protected const CONVERT_FROM_BASE_64 = 'fromBase64';

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="800000")
     */
    protected $text;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    protected $select;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getSelect(): ?string
    {
        return $this->select;
    }

    public function setSelect(string $select): self
    {
        $this->select = $select;

        return $this;
    }

    // todo: move inside manager. Build this class more abstract
    public function isConvertFromBase64(): bool
    {
        return static::CONVERT_FROM_BASE_64 === $this->select;
    }

    public function isConvertToBase64(): bool
    {
        return static::CONVERT_TO_BASE_64 === $this->select;
    }

    public function isValidSelectType(ExecutionContextInterface $context)
    {
        if (!in_array($this->select, static::selectChoices())) {
            $context->buildViolation('Select for converter type is wrong')
                ->atPath('select')
                ->addViolation();
        }
    }

    public static function selectChoices(): array
    {
        return [
            'base64.to.string' => static::CONVERT_FROM_BASE_64,
            'string.to.base64' => static::CONVERT_TO_BASE_64,
        ];
    }
}
