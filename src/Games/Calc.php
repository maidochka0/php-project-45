<?php

namespace Project1\Games\Calc;

function calculate(int $operand1, int $operand2, string $operation, int &$trueAns, string &$quest): void
{
    switch ($operation) {
        case '+':
            $trueAns = $operand1 + $operand2;
            $quest = "{$operand1} + {$operand2}";
            break;
        case '-':
            $trueAns = $operand1 - $operand2;
            $quest = "{$operand1} - {$operand2}";
            break;
        case '*':
            $trueAns = $operand1 * $operand2;
            $quest = "{$operand1} * {$operand2}";
            break;
    }
}

function calc()
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\getUserName();
    \Project1\Engine\calcQuest();
    $countTrueAns = 0;
    $answersLimit = 3;
    $lastInRange = 9;
    $resultNumb = 3;
    while ($countTrueAns < $answersLimit && $countTrueAns !== null) {
        $operand1 = rand(0, $lastInRange);
        $operand2 = rand(0, $lastInRange);
        $operation = '';
        $trueAns = 0;
        $quest = '';
        switch (rand(1, $resultNumb)) {
            case 1:
                $operation = '+';
                break;
            case 2:
                $operation = '-';
                break;
            case 3:
                $operation = '*';
                break;
        }
        calculate($operand1, $operand2, $operation, $trueAns, $quest);
        \Project1\Engine\roundQuest($quest);
        $countTrueAns = \Project1\Engine\userCanQuestAns($userName, (string)$trueAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $answersLimit) {
        \Project1\Engine\congratulations($userName);
    }
}
