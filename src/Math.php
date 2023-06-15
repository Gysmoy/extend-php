<?php

namespace SoDe\Extend;

class Math
{
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
}
