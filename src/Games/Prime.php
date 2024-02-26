<?php

namespace Project1\Games\Prime;

function prime()
{
    $first = 0;
    $last = 100;
    $list = range($first, $last);
    $primeList = [1];
    for ($i = 2, $len = count($list); $i < $len; $i++) {
        if ($list[$i] === null) {
            continue;
        }
        $primeList[] = $i;
        for ($j = $i; $j < $len; $j += $i) {
            $list[$j] = null;
        }
    }

    \Project1\Engine\welcome();
    $userName = \Project1\Cli\getUserName();
    echo 'Answer "yes" if given number is prime. Otherwise answer "no".';
    echo "\n";
    $len = count($primeList);
    $countTrueAns = 0;
    $answersLimit = 3;
    $first = 1;
    $last = 100;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $ansIndex = rand(0, $len - 1);
        if (rand(0, 1) === 1) {
            $questNumb = $primeList[$ansIndex];
        } else {
            $questNumb = rand($first, $last);
        }
        \Project1\Engine\roundQuest($questNumb);
        if (in_array($questNumb, $primeList, true)) {
            $questAns = 'yes';
        } else {
            $questAns = 'no';
        }
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, $questAns) ? $countTrueAns + 1 : null;
    }

    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
