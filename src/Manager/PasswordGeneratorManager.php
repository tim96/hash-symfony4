<?php declare(strict_types=1);

namespace App\Manager;

use App\Dto\PasswordGenerateDto;

class PasswordGeneratorManager
{
    public function generate(PasswordGenerateDto $passwordGenerateDto): array
    {
        $sets = array();
        $sets[] = '123456789';

        if ($passwordGenerateDto->isUsingChars()) {
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        }

        if($passwordGenerateDto->isUsingSpecialChars()) {
            $sets[] = '!@#$%&*?';
        }

        $count = $passwordGenerateDto->getCount();
        $length = $passwordGenerateDto->getLength();

        $results = [];
        for($i = 0; $i < $count; $i++) {
            $results[] = $this->generatePassword($length, $sets);
        }

        return $results;
    }

    protected function generatePassword($length, $sets): string
    {
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);

        return $password;
    }
}
