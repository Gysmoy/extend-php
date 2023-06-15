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
     * La función devuelve el mayor número de elementos de la matriz de entrada.
     * 
     * @param array numbers Una matriz de números de la que queremos encontrar
     * los valores más altos.
     * @param int quantity El número de valores más altos para devolver de la matriz.
     * 
     * @return array una matriz de los números más altos de la matriz de entrada.
     * La matriz se ordena en orden ascendente usando la función sort(), luego se
     * invierte usando array_reverse() para obtener primero los números más altos.
     * Finalmente, la función JSON::take() se usa para devolver solo los primeros
     * elementos de la matriz invertida.
     */
    public static function highs(array $numbers, int $quantity): array
    {
        sort($numbers);
        $desc = array_reverse($numbers);
        return JSON::take($desc, $quantity);
    }

    /**
     * La función "lows" toma una matriz de números y una cantidad entera, ordena
     * la matriz y devuelve la cantidad más baja de números de la matriz.
     * 
     * @param array numbers Una matriz de números que se ordenarán en orden ascendente.
     * @param int quantity El número de valores más bajos para devolver de la matriz
     * ordenada de números.
     * 
     * @return array una matriz de los números más bajos de la matriz de entrada,
     * después de ordenarla en orden ascendente.
     */
    public static function lows(array $numbers, int $quantity): array
    {
        sort($numbers);
        return JSON::take($numbers, $quantity);
    }
}
