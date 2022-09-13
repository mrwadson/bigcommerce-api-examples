<?php

namespace App;

use Bigcommerce\Api\Resources\Product;

class ProductRequest extends AbstractRequest
{
    public function getProducts(array $filter = []): array
    {
        /** @see Product */
        return $this->getItems('products', $filter);
    }
}
