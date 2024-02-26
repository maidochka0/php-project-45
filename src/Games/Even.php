<?php

namespace Project1\Games\Even;

function isEven(int $questNumb): string
{
    if ($questNumb % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function even()
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\getUserName();
    \Project1\Engine\evenQuest();
    $countTrueAns = 0;
    $answersLimit = 3;
    $rangeLen = 100;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $questNumb = rand(0, $rangeLen);
        $questAns = isEven($questNumb) ? 'yes' : 'no';
        \Project1\Engine\roundQuest($questNumb);
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, $questAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
