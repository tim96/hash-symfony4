<?php declare(strict_types=1);

namespace App\Dto;

class HashResultDto
{
    /** @var float */
    protected $time;

    /** @var array */
    protected $results;

    public function __construct(array $results, float $time)
    {
        $this->results = $results;
        $this->time = $time;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function getTime(): float
    {
        return $this->time;
    }
}
