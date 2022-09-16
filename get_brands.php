<?php

declare(strict_types=1);

use App\BrandRequest;
use App\Logger;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/brands.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

$filter = [
    'limit' => 1
];

try {
    foreach ((new BrandRequest())->getBrands($filter) as $id => $brand) {
        Logger::getLogger('brand', LOG_FILE)
            ->info(sprintf('Brand #%d:  %s', $id, print_r($brand, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
