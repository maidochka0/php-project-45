<?php

namespace Project1\Games\Calc;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function calc()
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\getUserName();
    echo "What is the result of the expression?\n";
    $countTrueAns = 0;
    $answersLimit = 3;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $operand1 = rand(0, 9);
        $operand2 = rand(0, 9);
        $trueAns = 0;
        $quest = '';
        switch (rand(0, 2)) {
            case 0:
                $trueAns = $operand1 + $operand2;
                $quest = "{$operand1} + {$operand2}";
                break;
            case 1:
                $trueAns = $operand1 - $operand2;
                $quest = "{$operand1} - {$operand2}";
                break;
            case 2:
                $trueAns = $operand1 * $operand2;
                $quest = "{$operand1} * {$operand2}";
                break;
        }
        echo "Question: {$quest}\n";
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, (string)$trueAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
