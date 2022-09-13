# BigCommerce Api examples

Example of using BigCommerce REST API V2 for fetching data.

## Requirements

- PHP 7.0 or greater
- Url extension enabled

## Installation

Run following command to install:

```shell script
composer install
```

## Configuration

Main configuration file `.env` should contain following properties:
- `CLIENT_ID` - BigCommerce Client ID (for created App)
- `ACCESS_TOKEN` - BigCommerce App Auth token (for created App)
- `STORE_HASH` - API Path in the url of the api site

To find your store hash Login to your `BigCommerce Store -> Go to Advanced Settings -> Click API Accounts -> Create API Account (V2/V3 Token)`

To generate an OAuth API token, [follow this guide](https://support.bigcommerce.com/s/article/Store-API-Accounts?language=en_US).

## Usage

Below run example to log [customers, products, orders, pages, coupons, product options] from BigCommerce site:

```php
php get_customers.php
php get_products.php
php get_orders.php
php get_pages.php
php get_coupons.php
php get_product_options.php
```

It will log accordingly:
- All customers data to `log/customers.log` file
- All products to `log/products.log` file
- All orders to `log/orders.log` file
- All pages to `log/pages.log` file
- All coupons to `log/coupons.log` file
- All product options to `log/product_options.log` file

## Help

To find more specific information please see official GitHub repo:
- https://github.com/bigcommerce/bigcommerce-api-php

Official APi Reference:
- https://developer.bigcommerce.com/api-reference
- https://developer.bigcommerce.com/legacy/
