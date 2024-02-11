<?php

namespace Project1\Games\Calc;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function calc() 
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\userName();
    print_r("What is the result of the expression?\n");
    $countTrueAns = 0;
    $ansLimit = 3;
    while ($countTrueAns < $ansLimit)
    {
        $op1 = rand(0,9);
        $op2 = rand(0,9);
        $trueAns = 0;
        $quest = '';
        switch (rand(0,2)) {
            case 0:
                $trueAns = $op1 + $op2;
                $quest = $op1 . '+' . $op2;
            case 1:
                $trueAns = $op1 - $op2;
                $quest = $op1 . '-' . $op2;
            case 2:
                $trueAns = $op1 * $op2;
                $quest = $op1 . '*' . $op2;
        }
        print_r("Question: {$quest}\n");
        $countTrueAns = \Project1\Engine\checkAns($userName, $trueAns) ? $countTrueAns + 1 : 0;
    }
    print_r("Congratulations, {$userName}!\n");
}