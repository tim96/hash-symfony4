<?php declare(strict_types=1);

namespace App\Manager\Form;

interface ProcessInterface
{
    public function getInstance();

    public function getType(): string;

    public function handle();

    public function onFinish();

    public function onError();
}