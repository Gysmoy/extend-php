<?php

namespace SoDe\Extend;

class JWTSoDe
{
    static private function password():string {
        $sign = 'f2c408d6-6d07-47e0-ab4c-7c082a54722c';
        $date = Trace::getDate('date');
        return $sign . $date;
    }
    static public function hash(): string
    {
        $hash = base64_encode(JWTSoDe::password());
        return password_hash($hash, PASSWORD_DEFAULT);
    }

    static public function verify(string $token): bool
    {
        $hash = base64_decode(str_replace('Bearer ', '', $token));
        return password_verify(JWTSoDe::password(), $hash);
    }
}
