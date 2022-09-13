<?php

namespace App;

use Bigcommerce\Api\Resources\Page;

class PageRequest extends AbstractRequest
{
    public function getPages(array $filter = []): array
    {
        /** @see Page */
        return $this->getItems('pages', $filter);
    }
}
