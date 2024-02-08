<?php
namespace Project1\Cli;

require_once "vendor/autoload.php"; //загружается только локальная автозагрузка

use function cli\line;
use function cli\prompt;

function welcome()
{
    print_r("Welcome to the Brain Games!\n");
}
function userName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
