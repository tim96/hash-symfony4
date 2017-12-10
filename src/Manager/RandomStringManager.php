<?php declare(strict_types=1);

namespace App\Manager;

use App\Dto\RandomStringDto;

class RandomStringManager
{
    public function generate(RandomStringDto $randomStringDto): string
    {
        return $this->getRand($randomStringDto->getLength());
    }

    protected function getRand(int $length): string
    {
        switch (true) {
            case function_exists("mcrypt_create_iv") :
                if (PHP_VERSION_ID >= 50300) {
                    $r = mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
                } else {
                    $r = mcrypt_create_iv($length, MCRYPT_RAND);
                }
                break;
            case function_exists("openssl_random_pseudo_bytes") :
                $r = openssl_random_pseudo_bytes($length);
                break;
            case is_readable('/dev/urandom') : // deceze
                $r = file_get_contents('/dev/urandom', false, null, 0, $length);
                break;
            default :
                $i = 0;
                $r = "";
                while($i ++ < $length) {
                    $r .= chr(mt_rand(0, 255));
                }
                break;
        }

        return substr(bin2hex($r), 0, $length);
    }
}