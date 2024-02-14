<?php

namespace Project1\Games\Even;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function even()
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\getUserName();
    echo 'Answer "yes" if the number is even, otherwise answer "no".';
    echo "\n";
    $countTrueAns = 0;
    $answersLimit = 3;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $questNumb = rand(0, 100);
        if ($questNumb % 2 === 0) {
            $questAns = "yes";
        } else {
            $questAns = "no";
        }
        echo "Question: {$questNumb}\n";
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, $questAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
