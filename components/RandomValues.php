<?php

namespace app\components;

/**
 * Class RandomString
 *
 * @package app\components
 */
class RandomValues
{

    private $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    private $alphabet = ['a','b','c','d','e',
        'f','g','h','i','j','k','l','m','n','o','p',
        'q','r','s','t','u','v','w','x','y','z','A',
        'B','C','D','E','F','G','H','I','J','K','L',
        'M','N','O','P','Q','R','S','T','U','V','W',
        'X','Y','Z'];
    private $alphabet_cyr = ['а', 'б', 'в', 'г', 'д',
        'е', 'ё', 'ж', 'з', 'и', 'к', 'л', 'м', 'н', 'о', 'п',
        'р', 'с', 'т', '', '', '', '', '', '', '', ''
        ];

    public function __construct()
    {

    }

    public static function setAlphabet()
    {

    }

    public function randomString($n = 8)
    {
        $random_string = '';
        while ($n >= 0) {
            $random_string .= $this->alphabet[mt_rand(0, (count($this->alphabet) - 1))];
            $n--;
        }
        return $random_string;
    }

    public function randomFloat()
    {

    }

    public function randomNumber()
    {

    }

} // end class
