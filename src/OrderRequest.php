<?php

namespace App;

use Bigcommerce\Api\Resources\Order;

class OrderRequest extends AbstractRequest
{
    public function getOrders(array $filter = []): array
    {
        /** @see Order */
        return $this->getItems('orders', $filter);
    }
}
