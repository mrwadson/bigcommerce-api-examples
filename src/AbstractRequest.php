<?php

namespace App;

use Bigcommerce\Api\Client as Bigcommerce;

abstract class AbstractRequest
{
    public function __construct()
    {
        Bigcommerce::configure([
            'client_id' => $_ENV['CLIENT_ID'],
            'auth_token' => $_ENV['ACCESS_TOKEN'],
            'store_hash' => $_ENV['STORE_HASH']
        ]);
    }

    protected function getItems(string $type): array
    {
        $result = [];
        if ($items = call_user_func('Bigcommerce\Api\Client::get' . ucfirst($type) . 's')) {
            foreach ($items as $item) {
                $result[$item->id] = (array)$item->getCreateFields();
            }
        }
        return $result;
    }
}
