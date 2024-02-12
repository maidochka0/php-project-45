<?php

namespace Project1\Games\Even;

require_once __DIR__ . "/../Cli.php";
require_once __DIR__ . "/../Engine.php";

function even() 
{
    \Project1\Engine\welcome();
    $userName = \Project1\Cli\userName();
    print_r('Answer "yes" if the number is even, otherwise answer "no".');
    echo "\n";
    $countTrueAns = 0;
    $ansLimit = 3;
    while ($countTrueAns < $ansLimit && $countTrueAns !== null) {
        $questNumb = rand(0, 100);
        if ($questNumb % 2 === 0) {
            $questAns = "yes";
        } else {
            $questAns = "no";
        }
        print_r("Question: {$questNumb}\n");
        $countTrueAns = \Project1\Engine\checkAns($userName, $questAns) ? $countTrueAns + 1 : null;
    }
    if ($countTrueAns === $ansLimit) \Project1\Engine\congratulations($userName);
    } 