<?php 

namespace Project1\Engine;

function checkAns($userName, $trueAns)
{
    $userAns = readline("Your answer: ");
    if ($userAns === $trueAns) {
        print_r("Correct!\n");
        return true;
    } else {
        print_r("'{$userAns}' is wrong answer ;(. Correct answer was '{$trueAns}'\n");
        print_r("Let's try again, {$userName}!\n");                  
        return false;
    }
}