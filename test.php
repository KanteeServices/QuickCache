<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

use Kaante\QuickCache\QuickCache;

$cache = new QuickCache();

$cache->set("test", "test", 10);

echo $cache->get("test");

$cache->delete("test");

echo $cache->get("test");
