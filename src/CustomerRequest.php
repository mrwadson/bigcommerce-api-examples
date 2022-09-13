<?php

namespace App;

use Bigcommerce\Api\Resources\Customer;

class CustomerRequest extends AbstractRequest
{
    public function getCustomers(array $filter = []): array
    {
        /** @see Customer */
        return $this->getItems('customers', $filter);
    }
}
