<?php

namespace Project1\Games\Gcd;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function gcd()
{
    function nod($numb1, $numb2)
    {
        $a = max($numb1, $numb2);
        $b = min($numb1, $numb2);
        do {
            $c = $a % $b;
            $a = $b;
            $b = $c;
        }while ($b !== 0);
        return $a;
    }
    
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\userName();
    print_r("Find the greatest common divisor of given numbers.\n");
    $countTrueAns = 0;
    $ansLimit = 3;
    while ($countTrueAns < $ansLimit) {
        $questNumb1 = rand(10,100);
        $questNumb2 = rand(10,100);
        $questAns = nod($questNumb1, $questNumb2);
        echo "Question: {$questNumb1} {$questNumb2}\n";
        $countTrueAns = \Project1\Engine\checkAns($userName, $questAns) ? $countTrueAns + 1 : 0;
    }
    echo "Congratulations, {$userName}!\n";
}