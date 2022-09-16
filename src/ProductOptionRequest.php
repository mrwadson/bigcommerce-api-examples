<?php

namespace App;

use Bigcommerce\Api\Resources\ProductOption;

class ProductOptionRequest extends AbstractRequest
{
    public function getOptions(array $filter = []): array
    {
        /** @see ProductOption */
        return $this->getItems('options', $filter);
    }
}
