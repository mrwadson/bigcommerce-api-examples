<?php

namespace App;

use Bigcommerce\Api\Resources\Brand;

class BrandRequest extends AbstractRequest
{
    public function getBrands(array $filter = []): array
    {
        /** @see Brand */
        return $this->getItems('brands', $filter);
    }
}
