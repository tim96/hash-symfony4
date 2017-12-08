<?php declare(strict_types=1);

namespace App\Manager;

use App\Dto\HashDto;
use App\Dto\HashResultDto;

class HashManager
{
    public function generate(HashDto $hashDto): HashResultDto
    {
        $text = $hashDto->getText();
        $salt = $hashDto->getSalt();

        $algorithms = array();
        foreach (hash_algos() as $v) {
            $algorithms[] = array($v => array('Text' => '(Text)', 'Value' => $text));
            $algorithms[] = array($v => array('Text' => '(Text.Salt)', 'Value' => $text.$salt));
            $algorithms[] = array($v => array('Text' => '(Salt.Text)', 'Value' => $salt.$text));
        }

        $time = microtime(true);
        $results = [];
        foreach($algorithms as $alg) {
            foreach($alg as $key => $value) {
                if (function_exists($key)) {
                    $results[] = array('alg' => $key . $value['Text'], 'res' => call_user_func($key, $value['Value']));
                } else {
                    $results[] = array('alg' => $key . $value['Text'], 'res' => hash($key, $value['Value']));
                }
            }
        }
        $time = microtime(true) - $time;

        return new HashResultDto($results, $time);
    }
}
