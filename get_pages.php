<?php

declare(strict_types=1);

use App\Logger;
use App\PageRequest;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/pages.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

$filter = [
    'limit' => 1
];

try {
    foreach ((new PageRequest())->getPages($filter) as $id => $page) {
        Logger::getLogger('page', LOG_FILE)
            ->info(sprintf('Page #%d:  %s', $id, print_r($page, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
