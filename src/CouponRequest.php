<?php

namespace App;

use Bigcommerce\Api\Resources\Coupon;

class CouponRequest extends AbstractRequest
{
    public function getCoupons(array $filter = []): array
    {
        /** @see Coupon */
        return $this->getItems('coupons', $filter);
    }
}
