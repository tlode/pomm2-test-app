<?php // .pomm_cli_bootstrap.php

$loader = require_once __DIR__.'/app/bootstrap.php.cache';

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$kernel->boot();

return $kernel->getContainer()->get('pomm');