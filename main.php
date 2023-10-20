<?php

require_once "vendor/autoload.php";

use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new \CoinDesk\Application());

try {
    $application->run();
} catch (Exception $e) {
    echo "Shit went south..." . $e->getMessage();
}
