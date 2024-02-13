<?php

namespace Project1\Games\Prime;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function prime()
{
    $list = range(0, 100);
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
    $userName = \Project1\Cli\userName();
    echo 'Answer "yes" if given number is prime. Otherwise answer "no".';
    echo "\n";
    $len = count($primeList);
    $countTrueAns = 0;
    $ansLimit = 3;
    while ($countTrueAns < $ansLimit && $countTrueAns !== null) {
        $ansIndex = rand(0, $len - 1);
        if (rand(0, 1) === 1) {
            $questNumb = $primeList[$ansIndex];
        } else {
            $questNumb = rand(1, 100);
        }
        echo "Question: {$questNumb}\n";
        if (in_array((int)$questNumb,$primeList, true)) {
            $questAns = 'yes';
        } else {
            $questAns = 'no';
        }
        $countTrueAns = \Project1\Engine\checkAns($userName, $questAns) ? $countTrueAns + 1 : null;
    }

    if ($countTrueAns === $ansLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
