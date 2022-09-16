<?php

namespace App;

use Bigcommerce\Api\Resources\Currency;

class CurrencyRequest extends AbstractRequest
{
    public function getCurrencies(array $filter = []): array
    {
        /** @see Currency */
        return $this->getItems('currencies', $filter);
    }
}
