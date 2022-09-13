<?php

namespace App;

use Bigcommerce\Api\Resources\Option;

class ProductOptionRequest extends AbstractRequest
{
    public function getOptions(array $filter = []): array
    {
        /** @see Option */
        return $this->getItems('options', $filter);
    }
}
