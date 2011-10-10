<?php

require __DIR__.'/../app/autoload.php';
require __DIR__.'/../app/AppKernel.php';
//require __DIR__.'/../app/AppCache.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel('prod', false);
//$kernel = new AppCache($kernel);
$request = Request::createFromGlobals();
$request->setFormat('rss', 'application/rss+xml');
$kernel->handle($request)->send();
