<?php

namespace SoDe\Extend;

/**
 * guid es una clase que genera un id random.
 * 
 * Propiedad de SoDe World
 */
class Crypto
{
    /**
     * Función que genera un id corto
     * @return string - una cadena de 8 caracteres.
     */
    static public function short(): string
    {
        $bytes = openssl_random_pseudo_bytes(4);
        return bin2hex($bytes);
    }

    /**
     * Genera un UUID (Universally Unique Identifier) aleatorio en su versión 4.
     *
     * @return string Un UUID aleatorio en su versión 4.
     */
    public static function randomUUID(): string
    {
        $bytes = openssl_random_pseudo_bytes(16);
        $bytes[6] = chr(ord($bytes[6]) & 0x0F | 0x40); // Set the version to 4
        $bytes[8] = chr(ord($bytes[8]) & 0x3F | 0x80); // Set the variant

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));
    }


    /**
     * Genera un token de acceso seguro.
     *
     * @param int $length La longitud del token (predeterminado: 32).
     * @return string Un token de acceso seguro.
     */
    public static function generateAccessToken(int $length = 32): string
    {
        $bytes = openssl_random_pseudo_bytes($length);
        return bin2hex($bytes);
    }

    /**
     * Genera una clave de cifrado segura.
     *
     * @param int $length La longitud de la clave (predeterminado: 16).
     * @return string Una clave de cifrado segura.
     */
    public static function generateEncryptionKey(int $length = 16): string
    {
        $bytes = openssl_random_pseudo_bytes($length);
        return base64_encode($bytes);
    }

    /**
     * Genera un token CSRF (Cross-Site Request Forgery) seguro.
     *
     * @param int $length La longitud del token (predeterminado: 16).
     * @return string Un token CSRF seguro.
     */
    public static function generateCSRFToken(int $length = 16): string
    {
        $bytes = openssl_random_pseudo_bytes($length);
        return bin2hex($bytes);
    }
}