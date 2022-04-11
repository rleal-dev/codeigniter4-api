<?php

namespace App\Services\Auth;

use App\Models\User;
use Firebase\JWT\JWT;

class LoginService
{
    public function login($request)
    {
        $email = $request->getVar('email');
        $password = $request->getVar('password');

        $user = (new User)->where('email', $email)->first();

        if (! $user) {
            return false;
        }

        $checkPassword = password_verify($password, $user['password']);

        if (! $checkPassword) {
            return false;
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            'iss' => 'Issuer of the JWT',
            'aud' => 'Audience that the JWT',
            'sub' => 'Subject of the JWT',
            'iat' => $iat,
            'exp' => $exp,
            'email' => $user['email'],
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
}
