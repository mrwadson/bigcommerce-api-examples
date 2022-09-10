<?php

namespace App;

class OrderRequest extends AbstractRequest
{
    public function getOrders(): array
    {
        return $this->getItems('order');
    }
}
