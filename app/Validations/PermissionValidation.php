<?php

namespace App\Validations;

class PermissionValidation
{
    public static function rules()
    {
        return [
            'name' => [
                'rules' => 'required|min_length[4]|max_length[255]',
            ],
            'description' => [
                'rules' => 'permit_empty|min_length[4]',
            ],
        ];
    }
}
