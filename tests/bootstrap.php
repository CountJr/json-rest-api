<?php

$autoloader = require __DIR__ . '/../vendor/autoload.php';

echo $rootDir . '/tmp/' . (isset($_SERVER['argv']) ? md5(serialize($_SERVER['argv'])) : getmypid());

Kdyby\TesterExtras\Bootstrap::setup(__DIR__);

function run(Tester\TestCase $testCase) {
    $testCase->run(isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : null );
}

return $autoloader;
