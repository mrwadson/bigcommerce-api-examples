<?php

declare(strict_types=1);

use App\CustomerRequest;
use App\Logger;
use App\OrderRequest;
use App\PageRequest;
use App\ProductRequest;
use Dotenv\Dotenv;

const ERROR_LOG_FILE = __DIR__ . '/log/error.log';
const CUSTOMERS_LOG_FILE = __DIR__ . '/log/customers.log';
const PRODUCTS_LOG_FILE = __DIR__ . '/log/products.log';
const ORDER_LOG_FILE = __DIR__ . '/log/orders.log';
const PAGES_LOG_FILE = __DIR__ . '/log/pages.log';

const LOG_CUSTOMERS = true;
const LOG_PRODUCTS = true;
const LOG_ORDERS = true;
const LOG_PAGES = true;

require __DIR__ . '/vendor/autoload.php';

$dotenv = (Dotenv::createImmutable(__DIR__))->load();

try {
    // Log all Customers
    if (LOG_CUSTOMERS) {
        foreach ((new CustomerRequest())->getCustomers() as $id => $customer) {
            Logger::getLogger('customer', CUSTOMERS_LOG_FILE)
                ->info(sprintf('Customer #%d: %s', $id, print_r($customer, true)));
        }
    }

    // Log all Products
    if (LOG_PRODUCTS) {
        foreach ((new ProductRequest())->getProducts() as $id => $product) {
            Logger::getLogger('product', PRODUCTS_LOG_FILE)
                ->info(sprintf('Product #%d: %s', $id, print_r($product, true)));
        }
    }

    // Log all Orders
    if (LOG_ORDERS) {
        foreach ((new OrderRequest())->getOrders() as $id => $order) {
            Logger::getLogger('order', ORDER_LOG_FILE)
                ->info(sprintf('Order #%d: %s', $id, print_r($order, true)));
        }
    }

    // Log all Pages
    if (LOG_PAGES) {
        foreach ((new PageRequest())->getPages() as $id => $page) {
            Logger::getLogger('page', PAGES_LOG_FILE)
                ->info(sprintf('Page #%d:  %s', $id, print_r($page, true)));
        }
    }
} catch (Throwable $e) {
    Logger::getLogger()->error($e->getMessage());
}
