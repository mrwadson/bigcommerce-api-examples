<?php

namespace App;

use Bigcommerce\Api\Client as Bigcommerce;
use Bigcommerce\Api\Resource;
use RuntimeException;
use stdClass;

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

    protected function getItems(string $type, array $filter =[]): array
    {
        $result = [];
        if ($items = call_user_func('Bigcommerce\Api\Client::get' . ucfirst($type), $filter)) {
            foreach ($items as $item) {
                $result[$item->id] = $this->getAllFields($item);
            }
        }
        return $result;
    }

    protected function getAllFields(Resource $resource): array
    {
        $result = [];
        if ($fields = $resource->getCreateFields()) {
            foreach ($fields as $key => $field) {
                $result[$key] = $this->processField($field, $resource, $key);
            }
        }
        return $result;
    }

    private function processField($field, Resource $resource = null, string $key = null)
    {
        $result = [];

        if ($field instanceof stdClass && isset($field->url, $field->resource)) {
            if ($resource && method_exists($resource, $key) && $result = $resource->{$key}()) {
                $result = $this->processField($result);
            }
        } elseif ($field instanceof Resource) {
            $result = $this->getAllFields($field);
        } elseif (is_array($field)) {
            $result = $this->processArrayFields($field);
        } else {
            $result = $field;
        }

        return $result;
    }

    private function processArrayFields(array $fields): array
    {
        $result = [];
        foreach ($fields as $field) {
            if ($field instanceof Resource) {
                $result[] = $this->getAllFields($field);
            } else {
                $result[] = $field;
            }
        }
        return $result;
    }

    public function __destruct()
    {
        if (($error = Bigcommerce::getLastError()) && isset($error[0]->status)) {
            throw new RuntimeException($error[0]->message, $error[0]->status);
        }
    }
}
