<?php

namespace SoDe\Extend;

use Exception;

class Math
{

    public const PI = 3.14159; // Valor de PI
    public const EULER_NUMBER = 2.71828; // Número de Euler
    public const GOLDEN_RATIO = 1.61803; // Proporción áurea

    /**
     * La función encuentra y retorna el valor mínimo de una lista
     * de parámetros.
     * 
     * @return int El valor mínimo entre los parámetros ingresados.
     */
    public static function min(...$args): int
    {
        $min = $args[0];
        foreach ($args as $number) {
            if ($number <= $min) {
                $min = $number;
            }
        }
        return $min;
    }

    /**
     * La función encuentra y retorna el valor máximo de una lista
     * de parámetros.
     * 
     * @return int El valor máximo entre los parámetros ingresados.
     */
    public static function max(...$args): int
    {
        $max = $args[0];
        foreach ($args as $number) {
            if ($number >= $max) {
                $max = $number;
            }
        }
        return $max;
    }

    /**
     * La función calcula el promedio de una lista de argumentos.
     * 
     * @return int El promedio de los parámetros ingresados.
     */
    public static function avg(...$args): int
    {
        $sum = 0;
        foreach ($args as $number) {
            $sum += $number;
        }
        return $sum / count($args);
    }

    /**
     * Redondea un número al número especificado de decimales.
     *
     * @param float $number El número que se va a redondear.
     * @param int $decimals El número de decimales a los que se debe redondear (predeterminado: 0).
     *
     * @return float El número redondeado al número especificado de decimales.
     */
    public static function round(float $number, int $decimals = 0): float
    {
        $multiplier = 10 ** $decimals;
        return round($number * $multiplier) / $multiplier;
    }

    /**
     * Devuelve los números más altos de una matriz en orden descendente.
     *
     * @param array $numbers Una matriz de números de la que queremos encontrar los valores más altos.
     * @param int $quantity El número de valores más altos para devolver de la matriz.
     *
     * @return array Una matriz de los números más altos de la matriz de entrada en orden descendente.
     */
    public static function highs(array $numbers, int $quantity): array
    {
        rsort($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    /**
     * Devuelve los números más bajos de una matriz en orden ascendente.
     *
     * @param array $numbers Una matriz de números de la que queremos encontrar los valores más bajos.
     * @param int $quantity El número de valores más bajos para devolver de la matriz.
     *
     * @return array Una matriz de los números más bajos de la matriz de entrada en orden ascendente.
     */
    public static function lows(array $numbers, int $quantity): array
    {
        sort($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    /**
     * Calcula la suma de una lista de números.
     *
     * @param array $numbers Una matriz de números para sumar.
     *
     * @return int La suma de los números en la matriz.
     */
    public static function sum(array $numbers): int
    {
        return array_sum($numbers);
    }

    /**
     * Calcula el factorial de un número.
     *
     * @param int $number El número para calcular el factorial.
     *
     * @return int El factorial del número.
     * @throws Exception Si el número es negativo.
     */
    public static function factorial(int $number): int
    {
        if ($number < 0) {
            throw new Exception('El número debe ser no negativo.');
        }

        $factorial = 1;
        for ($i = 2; $i <= $number; $i++) {
            $factorial *= $i;
        }

        return $factorial;
    }

    /**
     * Calcula el exponente de un número elevado a una potencia.
     *
     * @param float $base El número base.
     * @param float $exponent El exponente al que se eleva el número base.
     *
     * @return float El resultado de elevar el número base al exponente.
     */
    public static function pow(float $base, float $exponent): float
    {
        return pow($base, $exponent);
    }
}