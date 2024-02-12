<?php

namespace Project1\Games\Progression;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function progression()
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\userName();
    echo "What number is missing in the progression?\n";
    $countTrueAns = 0;
    $ansLimit = 3;
    $lenList = 5;
    while ($countTrueAns < $ansLimit &&  $countTrueAns !== null) {
        $step = rand(1,10);
        $list =[rand(0,10)];
        for ($i = 1, $next = $list[0] + $step; $i < $lenList; $i++) {
            $list[] = $next;
            $next += $step;
        }
        $ansIndex = rand(0,4);
        $questAns = $list[$ansIndex];
        $hidden = '..';
        $list[$ansIndex] = $hidden;
        echo "Question:";
        foreach ($list as $i) {
            echo " {$i}";
        }
        echo "\n";
        $countTrueAns = \Project1\Engine\checkAns($userName, $questAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $ansLimit) \Project1\Engine\congratulations($userName);
}