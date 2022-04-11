<?php

namespace App\Resources;

class BaseCollection
{
    protected $resource;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;

        $this->initialize();
    }

    private function initialize()
    {
        $data = array_map(fn ($item) => new $this->resource($item), $this->data);

        return $this->data = $data;
    }
}
