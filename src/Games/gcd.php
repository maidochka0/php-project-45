<?php

namespace Project1\Games\Gcd;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function nod(int $numb1, int $numb2): int
{
    $a = max($numb1, $numb2);
    $b = min($numb1, $numb2);
    do {
        $c = $a % $b;
        $a = $b;
        $b = $c;
    } while ($b !== 0);
    return $a;
}

function gcd()
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\getUserName();
    echo "Find the greatest common divisor of given numbers.\n";
    $countTrueAns = 0;
    $answersLimit = 3;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $questNumb1 = rand(10, 100);
        $questNumb2 = rand(10, 100);
        $questAns = nod($questNumb1, $questNumb2);
        echo "Question: {$questNumb1} {$questNumb2}\n";
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, (string)$questAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
