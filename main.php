<?php

require_once "vendor/autoload.php";

use Symfony\Component\Console\Application;
use CoinDesk\CoinDesk;
use CoinDesk\CoinDeskAPI;

$coinDesk = new CoinDesk(new CoinDeskAPI());
$application = new Application();

$application->add(new \CoinDesk\Application($coinDesk));

try {
    $application->run();
} catch (Exception $e) {
    echo "Shit went south..." . $e->getMessage();
}