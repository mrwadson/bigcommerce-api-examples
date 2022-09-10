# BigCommerce Api examples

Example of using BigCommerce REST API for getting data.

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

Below run example to log all [customers, products, orders, pages] from BigCommerce site:

```php
php read.php
```

It will log:
- All customers data to `log/customers.log` file
- All products to `log/products.log` file
- All orders to `log/orders.log` file
- All pages to `log/pages.log` file

## Help

To find more specific information please see official github repo:
https://github.com/bigcommerce/bigcommerce-api-php
