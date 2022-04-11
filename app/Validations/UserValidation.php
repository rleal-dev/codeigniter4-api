<?php

namespace App\Validations;

class UserValidation
{
    public static function rules()
    {
        return [
            'name' => [
                'rules' => 'required|min_length[4]|max_length[255]',
            ],
            'email' => [
                'rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]',
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[255]',
            ],
            'password_confirmation' => [
                'label' => 'confirm password',
                'rules' => 'matches[password]',
            ],
        ];
    }
}
