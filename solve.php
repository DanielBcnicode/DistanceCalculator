#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Console\travel\infrastructure\symfony\AppKernel;
use Console\travel\infrastructure\command\TravelCommand;
use Symfony\Component\Console\Application;

$kernel = new AppKernel("dev", false);
$kernel->boot();

$container = $kernel->getContainer();
$application = $container->get(Application::class);
$application->add($container->get(TravelCommand::class));
$application->setDefaultCommand('travel',true);

$application->run();

