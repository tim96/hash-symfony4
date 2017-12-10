<?php declare(strict_types=1);

namespace App\Manager;

class UuidGeneratorManager
{
    public function generate(): array
    {
        $uuids = [];
        $uuids[] = ['name' => 'uuid1', 'value' => \Ramsey\Uuid\Uuid::uuid1()->toString()];

        $ns = \Ramsey\Uuid\Uuid::uuid1()->toString();
        $name = 'test_name_3';
        $uuids[] = ['name' => 'uuid3', 'value' => \Ramsey\Uuid\Uuid::uuid3($ns, $name)->toString()];
        $uuids[] = ['name' => 'uuid4', 'value' => \Ramsey\Uuid\Uuid::uuid4()->toString()];

        $ns = \Ramsey\Uuid\Uuid::uuid1()->toString();
        $name = 'test_name_5';
        $uuids[] = ['name' => 'uuid5', 'value' => \Ramsey\Uuid\Uuid::uuid5($ns, $name)->toString()];

        return $uuids;
    }
}
