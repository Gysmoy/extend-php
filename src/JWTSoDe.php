<?php

namespace SoDe\Extend;

class JWTSoDe
{
    static public function getToken(): string
    {
        $sign = 'f2c408d6-6d07-47e0-ab4c-7c082a54722c';
        $date = Trace::getDate('date');
        return password_hash($sign . $date, PASSWORD_DEFAULT);
    }

    static public function verify(string $token): bool
    {
        $hash = password_hash(JWTSoDe::getToken(), PASSWORD_DEFAULT);
        $token = str_replace('Bearer ', '', $token);
        return password_verify($token, $hash);
    }
}
