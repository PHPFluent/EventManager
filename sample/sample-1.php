<?php
use PHPFluent\EventManager\Manager;
require_once 'bootstrap.php';

function someFunction(Manager $eventManager)
{
    echo "I'm executing\n";
    echo "Some operation\n";

    $eventManager->dispatchEvent("updated");
}

someFunction($eventManager);

echo file_get_contents("sample.txt").PHP_EOL;

$eventManager->dispatchEvent("remove.file.sample.txt", array((new DateTime)->format("m/d/Y")));
