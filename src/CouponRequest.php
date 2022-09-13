<?php

namespace App;

use Bigcommerce\Api\Resources\Product;

class CouponRequest extends AbstractRequest
{
    public function getCoupons(array $filter = []): array
    {
        /** @see Product */
        return $this->getItems('coupons', $filter);
    }
}
