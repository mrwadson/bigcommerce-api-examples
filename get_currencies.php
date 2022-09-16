<?php

declare(strict_types=1);

use App\CurrencyRequest;
use App\Logger;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const LOG_FILE = __DIR__ . '/log/currencies.log';

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

try {
    foreach ((new CurrencyRequest())->getCurrencies() as $id => $currency) {
        Logger::getLogger('currency', LOG_FILE)
            ->info(sprintf('Currency #%d: %s', $id, print_r($currency, true)));
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
