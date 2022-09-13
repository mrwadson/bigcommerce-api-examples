<?php

declare(strict_types=1);

use App\Logger;
use App\ProductOptionRequest;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/product_options.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

try {
    foreach ((new ProductOptionRequest())->getOptions() as $id => $option) {
        Logger::getLogger('product_option', LOG_FILE)
            ->info(sprintf('Product option #%d:  %s', $id, print_r($option, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
