<?php

namespace App;

use Bigcommerce\Api\Client as Bigcommerce;
use Bigcommerce\Api\Resources\Customer;

class CustomerRequest extends AbstractRequest
{
    public function getCustomers(): array
    {
        $result = [];

        $customers = Bigcommerce::getCustomers();

        /** @var Customer $customer */
        foreach ($customers as $customer) {
            $result[$customer->id]['customer'] = (array) $customer->getCreateFields();
            $result[$customer->id]['addresses'] = $this->getCustomerAddresses($customer);
        }

        return $result;
    }

    private function getCustomerAddresses(Customer $customer): array
    {
        $result = [];
        foreach ($customer->addresses() as $address) {
            $result[] = (array) $address->getCreateFields();
        }
        return $result;
    }
}
