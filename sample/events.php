<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Manager;

$eventManager = new Manager();

$eventManager->addEventListener(
    "updated",
    function () {
        echo "updated\n";
    }
);

$eventManager->addEventListener(
    "updated",
    function () {
        file_put_contents("sample.txt", (new DateTime())->format("m/d/Y"));
        echo "Wrote sample.txt\n";
    }
);

$eventManager->addEventListener(
    "remove.file.sample.txt",
    function (array $params) {
        unlink("sample.txt");
        $date = array_shift($params);
        echo "Deleted sample.txt at {$date}\n";
    }
);
