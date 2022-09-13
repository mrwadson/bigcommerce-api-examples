<?php

declare(strict_types=1);

use App\CouponRequest;
use App\Logger;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/coupons.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

$filter = [
    'limit' => 3,
];

try {
    foreach ((new CouponRequest())->getCoupons($filter) as $id => $product) {
        Logger::getLogger('coupon', LOG_FILE)
            ->info(sprintf('Coupon #%d: %s', $id, print_r($product, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
