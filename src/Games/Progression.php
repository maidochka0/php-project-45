<?php

namespace Project1\Games\Progression;

function makeRandProgressionList()
{
    $lenList = 5;
    $maxNum = 10;
    $step = rand(1, $maxNum);
    $list = [rand(0, $maxNum)];
    for ($i = 1, $next = $list[0] + $step; $i < $lenList; $i++) {
        $list[] = $next;
        $next += $step;
    }
    return $list;
}
function progression()
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\getUserName();
    \Project1\Engine\progressionQuest();
    $countTrueAns = 0;
    $answersLimit = 3;
    $lenList = 5;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $list = makeRandProgressionList();
        $ansIndex = rand(0, $lenList - 1);
        $questAns = $list[$ansIndex];
        $hidden = '..';
        $list[$ansIndex] = $hidden;
        \Project1\Engine\printQuestList($list);
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, (string)$questAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
