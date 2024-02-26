<?php

namespace Project1\Games\Gcd;

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
    \Project1\Engine\gcdQuest();
    $countTrueAns = 0;
    $answersLimit = 3;
    $min = 10;
    $max = 100;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $questNumb1 = rand($min, $max);
        $questNumb2 = rand($min, $max);
        $questAns = nod($questNumb1, $questNumb2);
        \Project1\Engine\roundQuest("{$questNumb1} {$questNumb2}");
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, (string)$questAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
