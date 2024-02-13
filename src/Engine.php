<?php

namespace Project1\Engine;

require_once __DIR__ . "/Cli.php";

function welcome()
{
    print_r("Welcome to the Brain Games!\n");
}

function checkAns(string $userName, string $trueAns)
{
    $userAns = readline("Your answer: ");
    if ($userAns === $trueAns) {
        print_r("Correct!\n");
        return true;
    } else {
        print_r("'{$userAns}' is wrong answer ;(. Correct answer was '{$trueAns}'.\n");
        print_r("Let's try again, {$userName}!\n");
        return false;
    }
}

function congratulations(string $userName)
{
    echo "Congratulations, {$userName}!\n";
}
