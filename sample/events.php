<?php
use PHPFluent\EventManager\Manager;

$eventManager = new Manager();

$eventManager->addListener(
        "updated",
        function()
        {
            echo "updated\n";
        });

$eventManager->addListener(
        "updated",
        function()
        {
            file_put_contents("sample.txt", (new DateTime())->format("m/d/Y"));
            echo "Wrote sample.txt\n";
        });

$eventManager->addListener(
        "remove.file.sample.txt",
        function($date)
        {
            unlink("sample.txt");
            echo "Deleted sample.txt at {$date}\n";
        });
