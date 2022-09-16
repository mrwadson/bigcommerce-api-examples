<?php

declare(strict_types=1);

use App\Logger;
use App\CategoryRequest;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/categories.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

$filter = [
    'limit' => 3,
    'exclude' => 'skus'
];

try {
    foreach ((new CategoryRequest())->getCategories($filter) as $id => $category) {
        Logger::getLogger('category', LOG_FILE)
            ->info(sprintf('Category #%d: %s', $id, print_r($category, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
