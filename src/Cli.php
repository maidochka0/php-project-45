<?php

namespace Project1\Cli;

use function cli\line;
use function cli\prompt;
function getUserName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
