<?php

namespace App\Services\Auth;

use App\Models\User;
use Firebase\JWT\JWT;

class LoginService
{
    public function login($request)
    {
        if (! $this->checkCredentials($request)) {
            return false;
        }

        $key = getenv('JWT_SECRET');
        $payload = $this->getTokenPayload($request);

        return JWT::encode($payload, $key, 'HS256');
    }

    private function checkCredentials($request)
    {
        $email = $request->getVar('email');
        $password = $request->getVar('password');

        $user = (new User)->where('email', $email)->first();

        if (! $user) {
            return false;
        }

        return password_verify($password, $user['password']);
    }

    private function getTokenPayload($request)
    {
        return [
            'iss' => 'Issuer of the JWT',
            'aud' => 'Audience that the JWT',
            'sub' => 'Subject of the JWT',
            'iat' => time(),
            'exp' => time() + 3600,
            'email' => $request->getVar('email'),
        ];
    }
}
