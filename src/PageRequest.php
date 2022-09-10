<?php

namespace App;

class PageRequest extends AbstractRequest
{
    public function getPages(): array
    {
        return $this->getItems('page');
    }
}
