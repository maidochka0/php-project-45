<?php
namespace Project1\Cli;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

//use function cli\line;
//use function cli\prompt;
function userName()
{
    $name = readline("May I have your name? ");
    echo "Hello, {$name}!\n";
    return $name;
}
