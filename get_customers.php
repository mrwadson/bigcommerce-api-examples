<?php

declare(strict_types=1);

use App\CustomerRequest;
use App\Logger;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/customers.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

$filter = [
    'customer_group_id' => 0
];

try {
    foreach ((new CustomerRequest())->getCustomers($filter) as $id => $customer) {
        Logger::getLogger('customer', LOG_FILE)
            ->info(sprintf('Customer #%d: %s', $id, print_r($customer, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
