<?php

namespace App\Resources;

class BaseResource
{
    protected $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;

        $this->clearAttributes();
        $this->initialize();
        $this->mergeAttributes();
    }

    private function clearAttributes()
    {
        foreach (get_object_vars($this) as $attribute => $value) {
            if ($attribute != 'resource') {
                unset($this->{$attribute});
            }
        }
    }

    private function initialize($resource = null)
    {
        $resource ??= $this->resource;
        foreach ($resource as $field => $value) {
            $this->{$field} = $value;
        }
    }

    private function mergeAttributes()
    {
        $allowedFields = $this->toArray();

        $this->clearAttributes();

        return $this->initialize($allowedFields);
    }

    public function toArray()
    {
        return [];
    }
}
