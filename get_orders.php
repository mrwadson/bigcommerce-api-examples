<?php

declare(strict_types=1);

use App\Logger;
use App\OrderRequest;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/orders.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

$filter = [
    'limit' => 1,
];

try {
    foreach ((new OrderRequest())->getOrders($filter) as $id => $customer) {
        Logger::getLogger('order', LOG_FILE)
            ->info(sprintf('Order #%d: %s', $id, print_r($customer, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
