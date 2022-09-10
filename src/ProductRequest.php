<?php

namespace App;

class ProductRequest extends AbstractRequest
{
    public function getProducts(): array
    {
        return $this->getItems('product');
    }
}
