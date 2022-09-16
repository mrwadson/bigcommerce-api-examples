<?php

namespace App;

use Bigcommerce\Api\Resources\Category;

class CategoryRequest extends AbstractRequest
{
    public function getCategories(array $filter = []): array
    {
        /** @see Category */
        return $this->getItems('categories', $filter);
    }
}
