<?php

declare(strict_types=1);

use App\Logger;
use App\ProductRequest;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/products.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

$filter = [
    'limit' => 3,
    'exclude' => 'skus'
];

try {
    foreach ((new ProductRequest())->getProducts($filter) as $id => $product) {
        Logger::getLogger('product', LOG_FILE)
            ->info(sprintf('Product #%d: %s', $id, print_r($product, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
